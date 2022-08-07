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

namespace Josantonius\Session\Facades;

use Josantonius\Session\Session as SessionInstance;
use Josantonius\Session\Exceptions\HeadersSentException;
use Josantonius\Session\Exceptions\SessionStartedException;
use Josantonius\Session\Exceptions\SessionNotStartedException;
use Josantonius\Session\Exceptions\WrongSessionOptionException;

/**
 * Session handler.
 */
class Session
{
    private static ?SessionInstance $session;

    private static function getInstance()
    {
        return self::$session ?? new SessionInstance();
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
     * @throws HeadersSentException        if headers already sent.
     * @throws SessionStartedException     if session already started.
     * @throws WrongSessionOptionException If setting options failed.
     */
    public static function start(array $options = []): bool
    {
        return self::getInstance()->start($options);
    }

    /**
     * Gets all attributes.
     */
    public static function all(): array
    {
        return self::getInstance()->all();
    }

    /**
     * Checks if an attribute exists in the session.
     */
    public static function has(string $name): bool
    {
        return self::getInstance()->has($name);
    }

    /**
     * Gets an attribute by name.
     *
     * Optionally defines a default value when the attribute does not exist.
     */
    public static function get(string $name, mixed $default = null): mixed
    {
        return self::getInstance()->get($name, $default);
    }

    /**
     * Sets an attribute by name.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public static function set(string $name, mixed $value): void
    {
        self::getInstance()->set($name, $value);
    }

    /**
     * Sets several attributes at once.
     *
     * If attributes exist they are replaced, if they do not exist they are created.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public static function replace(array $data): void
    {
        self::getInstance()->replace($data);
    }

    /**
     * Deletes an attribute by name and returns its value.
     *
     * Optionally defines a default value when the attribute does not exist.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public static function pull(string $name, mixed $default = null): mixed
    {
        return self::getInstance()->pull($name, $default);
    }

    /**
     * Deletes an attribute by name.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public static function remove(string $name): void
    {
        self::getInstance()->remove($name);
    }

    /**
     * Free all session variables.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public static function clear(): void
    {
        self::getInstance()->clear();
    }

    /**
     * Gets the session ID.
     */
    public static function getId(): string
    {
        return self::getInstance()->getId();
    }

    /**
     * Sets the session ID.
     *
     * @throws SessionStartedException if session already started.
     */
    public static function setId(string $sessionId): void
    {
        session_id($sessionId);
    }

    /**
     * Updates the current session id with a newly generated one.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public static function regenerateId(bool $deleteOldSession = false): bool
    {
        return self::getInstance()->regenerateId($deleteOldSession);
    }

    /**
     * Gets the session name.
     */
    public static function getName(): string
    {
        return self::getInstance()->getName();
    }

    /**
     * Sets the session name.
     *
     * @throws SessionStartedException if session already started.
     */
    public static function setName(string $name): void
    {
        self::getInstance()->setName($name);
    }

    /**
     * Destroys the session.
     *
     * @throws SessionNotStartedException if session was not started.
     */
    public static function destroy(): bool
    {
        return self::getInstance()->destroy();
    }

    /**
     * Checks if the session is started.
     */
    public static function isStarted(): bool
    {
        return self::getInstance()->isStarted();
    }
}
