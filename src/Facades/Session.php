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
    private static function getInstance(): SessionInstance
    {
        return new SessionInstance();
    }

    /**
     * Starts the session with the supplied PHP options.
     *
     * Omitted options keep their current PHP values.
     * cookie_partitioned is accepted only on PHP 8.5 or later.
     *
     * @see https://php.net/session.configuration
     *
     * @throws HeadersSentException        if headers already sent.
     * @throws SessionStartedException     if session already started.
     * @throws WrongSessionOptionException if an option name is not supported.
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
