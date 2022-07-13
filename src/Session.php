<?php

declare(strict_types=1);

/*
 * This file is part of https://github.com/josantonius/php-session repository.
 *
 * (c) Josantonius <hello@josantonius.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Josantonius\Session;

use Josantonius\Session\Exceptions\SessionException;

/**
 * Session handler.
 */
class Session
{
    public function __construct()
    {
        set_error_handler(
            fn (int $severity, string $message, string $file) =>
            $file === __FILE__ && throw new SessionException($message)
        );
    }

    /**
     * Starts the session.
     *
     * List of available $options with their default values:
     *
     * * cache_expire: "180"
     * * cache_limiter: "nocache"
     * * cookie_domain: ""
     * * cookie_httponly: "0"
     * * cookie_lifetime: "0"
     * * cookie_path: "/"
     * * cookie_samesite: ""
     * * cookie_secure: "0"
     * * gc_divisor: "100"
     * * gc_maxlifetime: "1440"
     * * gc_probability: "1"
     * * lazy_write: "1"
     * * name: "PHPSESSID"
     * * read_and_close: "0"
     * * referer_check: ""
     * * save_handler: "files"
     * * save_path: ""
     * * serialize_handler: "php"
     * * sid_bits_per_character: "4"
     * * sid_length: "32"
     * * trans_sid_hosts: $_SERVER['HTTP_HOST']
     * * trans_sid_tags: "a=href,area=href,frame=src,form="
     * * use_cookies: "1"
     * * use_only_cookies: "1"
     * * use_strict_mode: "0"
     * * use_trans_sid: "0"
     *
     * @see https://php.net/session.configuration
     *
     * @throws SessionException if headers already sent
     * @throws SessionException if session already started
     * @throws SessionException If setting options failed
     */
    public function start(array $options = []): bool
    {
        return session_start($options);
    }

    /**
     * Gets all attributes.
     */
    public function all(): array
    {
        return $_SESSION ?? [];
    }

    /**
     * Check if an attribute exists in the session.
     */
    public function has(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Gets an attribute by name.
     * Optionally defines a default value when the attribute does not exist.
     */
    public function get(string $name, mixed $default = null): mixed
    {
        return $_SESSION[$name] ?? $default;
    }

    /**
     * Sets an attribute by name.
     *
     * @throws SessionException if session is unstarted
     */
    public function set(string $name, mixed $value): void
    {
        $this->failIfSessionWasNotStarted();

        $_SESSION[$name] = $value;
    }

    /**
     * Sets several attributes at once.
     * If attributes exist they are replaced, if they do not exist they are created.
     *
     * @throws SessionException if session is unstarted
     */
    public function replace(array $data): void
    {
        $this->failIfSessionWasNotStarted();

        $_SESSION = array_merge($_SESSION, $data);
    }

    /**
     * Deletes an attribute by name and returns its value.
     * Optionally defines a default value when the attribute does not exist.
     *
     * @throws SessionException if session is unstarted
     */
    public function pull(string $name, mixed $default = null): mixed
    {
        $this->failIfSessionWasNotStarted();

        $value = $_SESSION[$name] ?? $default;

        unset($_SESSION[$name]);

        return $value;
    }

    /**
     * Deletes an attribute by name.
     *
     * @throws SessionException if session is unstarted
     */
    public function remove(string $name): void
    {
        $this->failIfSessionWasNotStarted();

        unset($_SESSION[$name]);
    }

    /**
     * Free all session variables.
     *
     * @throws SessionException if session is unstarted
     */
    public function clear(): void
    {
        $this->failIfSessionWasNotStarted();

        session_unset();
    }

    /**
     * Gets the session ID.
     */
    public function getId(): string
    {
        return session_id();
    }

    /**
     * Sets the session ID.
     *
     * @throws SessionException if session already started
     */
    public function setId(string $sessionId): void
    {
        session_id($sessionId);
    }

    /**
     * Update the current session id with a newly generated one.
     *
     * @throws SessionException if session is unstarted
     */
    public function regenerateId(bool $deleteOldSession = false): bool
    {
        return session_regenerate_id($deleteOldSession);
    }

    /**
     * Gets the session name.
     */
    public function getName(): string
    {
        $name = session_name();

        return $name ? $name : '';
    }

    /**
     * Sets the session name.
     *
     * @throws SessionException if session already started
     */
    public function setName(string $name): void
    {
        session_name($name);
    }

    /**
     * Destroys the session.
     *
     * @throws SessionException if session is unstarted
     */
    public function destroy(): bool
    {
        return session_destroy();
    }

    /**
     * Check if the session is started.
     */
    public function isStarted(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    /**
     * Show warning if the session is not started.
     */
    private function failIfSessionWasNotStarted(): void
    {
        if (!$this->isStarted()) {
            $method = debug_backtrace()[1]['function'] ?? 'unknown';

            trigger_error(
                'Session->' . $method . '(): Changing $_SESSION when no started session.',
                E_USER_WARNING
            );
        }
    }
}
