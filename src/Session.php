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

use Josantonius\Session\Exceptions\HeadersSentException;
use Josantonius\Session\Exceptions\SessionStartedException;
use Josantonius\Session\Exceptions\SessionNotStartedException;
use Josantonius\Session\Exceptions\WrongSessionOptionException;

/**
 * Session handler.
 */
class Session
{
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
     * @throws HeadersSentException        if headers already sent.
     * @throws SessionStartedException     if session already started.
     * @throws WrongSessionOptionException If setting options failed.
     */
    public function start(array $options = []): bool
    {
        $this->throwExceptionIfHeadersWereSent();
        $this->throwExceptionIfSessionWasStarted();
        $this->throwExceptionIfHasWrongOptions($options);

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
     * Checks if an attribute exists in the session.
     */
    public function has(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Gets an attribute by name.
     *
     * Optionally defines a default value when the attribute does not exist.
     */
    public function get(string $name, mixed $default = null): mixed
    {
        return $_SESSION[$name] ?? $default;
    }

    /**
     * Sets an attribute by name.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public function set(string $name, mixed $value): void
    {
        $this->throwExceptionIfSessionWasNotStarted();

        $_SESSION[$name] = $value;
    }

    /**
     * Sets several attributes at once.
     *
     * If attributes exist they are replaced, if they do not exist they are created.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public function replace(array $data): void
    {
        $this->throwExceptionIfSessionWasNotStarted();

        $_SESSION = array_merge($_SESSION, $data);
    }

    /**
     * Deletes an attribute by name and returns its value.
     *
     * Optionally defines a default value when the attribute does not exist.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public function pull(string $name, mixed $default = null): mixed
    {
        $this->throwExceptionIfSessionWasNotStarted();

        $value = $_SESSION[$name] ?? $default;

        unset($_SESSION[$name]);

        return $value;
    }

    /**
     * Deletes an attribute by name.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public function remove(string $name): void
    {
        $this->throwExceptionIfSessionWasNotStarted();

        unset($_SESSION[$name]);
    }

    /**
     * Free all session variables.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public function clear(): void
    {
        $this->throwExceptionIfSessionWasNotStarted();

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
     * @throws SessionStartedException if session already started.
     */
    public function setId(string $sessionId): void
    {
        $this->throwExceptionIfSessionWasStarted();

        session_id($sessionId);
    }

    /**
     * Updates the current session id with a newly generated one.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public function regenerateId(bool $deleteOldSession = false): bool
    {
        $this->throwExceptionIfSessionWasNotStarted();

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
     * @throws SessionStartedException if session already started.
     */
    public function setName(string $name): void
    {
        $this->throwExceptionIfSessionWasStarted();

        session_name($name);
    }

    /**
     * Destroys the session.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public function destroy(): bool
    {
        $this->throwExceptionIfSessionWasNotStarted();

        return session_destroy();
    }

    /**
     * Checks if the session is started.
     */
    public function isStarted(): bool
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    /**
     * Throw exception if the session have wrong options.
     *
     * @throws WrongSessionOptionException If setting options failed.
     */
    private function throwExceptionIfHasWrongOptions(array $options): void
    {
        $validOptions = array_flip([
            'cache_expire',    'cache_limiter',     'cookie_domain',          'cookie_httponly',
            'cookie_lifetime', 'cookie_path',       'cookie_samesite',        'cookie_secure',
            'gc_divisor',      'gc_maxlifetime',    'gc_probability',         'lazy_write',
            'name',            'read_and_close',    'referer_check',          'save_handler',
            'save_path',       'serialize_handler', 'sid_bits_per_character', 'sid_length',
            'trans_sid_hosts', 'trans_sid_tags',    'use_cookies',            'use_only_cookies',
            'use_strict_mode', 'use_trans_sid',
        ]);

        foreach (array_keys($options) as $key) {
            if (!isset($validOptions[$key])) {
                throw new WrongSessionOptionException($key);
            }
        }
    }

    /**
     * Throw exception if headers have already been sent.
     *
     * @throws HeadersSentException if headers already sent.
     */
    private function throwExceptionIfHeadersWereSent(): void
    {
        $headersWereSent = (bool) ini_get('session.use_cookies') && headers_sent($file, $line);

        $headersWereSent && throw new HeadersSentException($file, $line);
    }

    /**
     * Throw exception if the session has already been started.
     *
     * @throws SessionStartedException if session already started.
     */
    private function throwExceptionIfSessionWasStarted(): void
    {
        $methodName = debug_backtrace()[1]['function'] ?? 'unknown';

        $this->isStarted() && throw new SessionStartedException($methodName);
    }

    /**
     * Throw exception if the session was not started.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    private function throwExceptionIfSessionWasNotStarted(): void
    {
        $methodName = debug_backtrace()[1]['function'] ?? 'unknown';

        !$this->isStarted() && throw new SessionNotStartedException($methodName);
    }
}
