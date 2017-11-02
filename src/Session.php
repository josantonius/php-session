<?php
/**
 * PHP library for handling sessions.
 *
 * @author    David Carr  <info@daveismyname.blog>
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 (c) Josantonius - PHP-Session
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Session
 * @since     1.0.0
 */

namespace Josantonius\Session;

/**
 * Session handler.
 *
 * @since 1.0.0
 */
class Session
{
    /**
     * Prefix for sessions.
     *
     * @since 1.0.0
     *
     * @var string
     *
     * @return void
     */
    private static $prefix = 'jst_';

    /**
     * Determine if session has started.
     *
     * @since 1.0.0
     *
     * @var boolean
     *
     * @return void
     */
    private static $sessionStarted = false;

    /**
     * Set prefix for sessions.
     *
     * @since 1.0.0
     *
     * @param mixed $prefix → prefix for sessions
     *
     * @return boolean
     */
    public static function setPrefix($prefix)
    {
        return (is_string(self::$prefix = $prefix));
    }

    /**
     * If session has not started, start sessions.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function init()
    {
        if (self::$sessionStarted == false) {
            session_set_cookie_params(0);
            session_start();
            return self::$sessionStarted = true;
        }

        return false;
    }

    /**
     * Add value to a session.
     *
     * @since 1.0.0
     *
     * @param string $key   → name the data to save
     * @param mixed  $value → the data to save
     *
     * @return boolean true
     */
    public static function set($key, $value = false)
    {
        if (is_array($key) && $value == false) {
            foreach ($key as $name => $value) {
                $_SESSION[self::$prefix . $name] = $value;
            }
        } else {
            $_SESSION[self::$prefix . $key] = $value;
        }

        return true;
    }

    /**
     * Extract session item, delete session item and finally return the item.
     *
     * @since 1.0.0
     *
     * @param string $key → item to extract
     *
     * @return mixed|null → return item or null when key does not exists
     */
    public static function pull($key)
    {
        if (isset($_SESSION[self::$prefix . $key])) {
            $value = $_SESSION[self::$prefix . $key];
            unset($_SESSION[self::$prefix . $key]);
            return $value;
        }

        return null;
    }

    /**
     * Get item from session.
     *
     * @since 1.0.0
     *
     * @param string          $key       → item to look for in session
     * @param string|boolean  $secondkey → if used then use as a second key
     *
     * @return mixed|null → key value, or null if key doesn't exists
     */
    public static function get($key = '', $secondkey = false)
    {
        $name = self::$prefix . $key;

        if (empty($key)) {
            return isset($_SESSION) ? $_SESSION : null;
        } elseif ($secondkey) {
            if (isset($_SESSION[$name][$secondkey])) {
                return $_SESSION[$name][$secondkey];
            }
        }

        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }

    /**
     * Get session id.
     *
     * @since 1.0.0
     *
     * @return string → the session id or empty
     */
    public static function id()
    {
        return session_id();
    }

    /**
     * Regenerate session_id.
     *
     * @since 1.0.0
     *
     * @return string → session_id
     */
    public static function regenerate()
    {
        session_regenerate_id(true);

        return session_id();
    }

    /**
     * Empties and destroys the session.
     *
     * @since 1.0.0
     *
     * @param string  $key    → session name to destroy
     * @param boolean $prefix → if true clear all sessions for current prefix
     *
     * @return boolean
     */
    public static function destroy($key = '', $prefix = false)
    {
        if (self::$sessionStarted == true) {
            if ($key == '' && $prefix == false) {
                session_unset();
                session_destroy();
            } elseif ($prefix == true) {
                foreach ($_SESSION as $index => $value) {
                    if (strpos($index, self::$prefix) === 0) {
                        unset($_SESSION[$index]);
                    }
                }
            } else {
                unset($_SESSION[self::$prefix . $key]);
            }

            return true;
        }

        return false;
    }
}
