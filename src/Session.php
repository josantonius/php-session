<?php
/**
 * PHP library for handling sessions.
 * 
 * @author     David Carr  - info@daveismyname.blog
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Session
 * @since      1.0.0
 */

namespace Josantonius\Session;

# use Josantonius\Session\Exception\SessionException;

/**
 * Session handler.
 *
 * @since 1.0.0
 */
class Session {

    /**
     * Prefix for sessions.
     *
     * @since 1.0.0
     *
     * @var string
     */
    private static $_prefix = 'jst_';

    /**
     * Determine if session has started.
     *
     * @since 1.0.0
     *
     * @var boolean
     */
    private static $_sessionStarted = false;

    /**
     * Set prefix for sessions.
     *
     * @since 1.0.0
     */
    public static function setPrefix($prefix) {

        static::$_prefix = $prefix;
    }

    /**
     * if session has not started, start sessions
     *
     * @since 1.0.0
     */
    public static function init() {

        if (static::$_sessionStarted === false) {

            session_set_cookie_params(0);
            session_start();
            static::$_sessionStarted = true;
        }
    }

    /**
     * Add value to a session.
     *
     * @since 1.0.0
     *
     * @param mixed $key    → name the data to save
     * @param string $value → the data to save
     */
    public static function set($key, $value = false) {

        /**
        * Check whether session is set in array or not
        * If array then set all session key-values in foreach loop
        */
        if (is_array($key) && $value === false) {

            foreach ($key as $name => $value) {

                $_SESSION[static::$_prefix.$name] = $value;
            }

        } else {

            $_SESSION[static::$_prefix.$key] = $value;
        }
    }

    /**
     * Extract item from session then delete from the session, finally return the item.
     *
     * @since 1.0.0
     *
     * @param string $key → item to extract
     *
     * @return mixed|null → return item or null when key does not exists
     */
    public static function pull($key) {

        if (isset($_SESSION[static::$_prefix.$key])) {

            $value = $_SESSION[static::$_prefix.$key];

            unset($_SESSION[static::$_prefix.$key]);

            return $value;
        }

        return null;
    }

    /**
     * Get item from session.
     *
     * @since 1.0.0
     *
     * @param  string  $key       → item to look for in session
     * @param  mixed   $secondkey → if used then use as a second key
     *
     * @return mixed|null → returns the key value, or null if key doesn't exists
     */
    public static function get($key, $secondkey = false) {

        if ($secondkey == true) {

            if (isset($_SESSION[static::$_prefix.$key][$secondkey])) {

                return $_SESSION[static::$_prefix.$key][$secondkey];
            }
        } 
        
        return (isset($_SESSION[static::$_prefix.$key])) ? $_SESSION[static::$_prefix.$key] : null;
    }

    /**
     * ID
     *
     * @since 1.0.0
     *
     * @return string → the session id
     */
    public static function id() {

        return session_id();
    }

    /**
     * Regenerate session_id.
     *
     * @since 1.0.0
     *
     * @return string → session_id
     */
    public static function regenerate() {

        session_regenerate_id(true);
        return session_id();
    }

    /**
     * Return the session array.
     *
     * @since 1.0.0
     *
     * @return array → session indexes
     */
    public static function display() {

        return $_SESSION;
    }


    /**
     * Empties and destroys the session.
     *
     * @since 1.0.0
     *
     * @param  string  $key    → session name to destroy
     * @param  boolean $prefix → if set to true clear all sessions for current prefix
     */
    public static function destroy($key = '', $prefix = false) {

        if (static::$_sessionStarted == true) {

            if ($key == '' && $prefix == false) {

                session_unset();
                session_destroy();

            } else if ($prefix == true) {
                /** clear all session for set static::$_prefix */
                foreach($_SESSION as $key => $value) {

                    if (strpos($key, static::$_prefix) === 0) {

                        unset($_SESSION[$key]);
                    }
                }

            } else {
                /** clear specified session key */
                unset($_SESSION[static::$_prefix.$key]);
            }
        }
    }
}
