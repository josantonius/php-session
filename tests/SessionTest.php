<?php
/**
 * PHP library for handling sessions.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Session
 * @since      1.0.0
 */

namespace Josantonius\Session\Tests;

use Josantonius\Session\Session;

/**
 * Tests class for Session library.
 *
 * @since 1.0.0
 */
class SessionTest {

    /**
     * Set prefix for sessions.
     *
     * @since 1.0.0
     */
    public static function testSetPrefix() {

        Session::setPrefix('ses');
    }

    /**
     * Add value to a session.
     *
     * @since 1.0.0
     */
    public static function testSet() {

        Session::init();

        Session::set('name', 'Joseph');

        var_dump(Session::get('name'));
    }

    /**
     * Add multiple value to sessions.
     *
     * @since 1.0.0
     */
    public static function testSetMultiple() {

        Session::init();

        $data = [
            'name' => 'Joseph',
            'age'  => '88',
            'business' => [
                'name' => 'My company'
            ]
        ];

        Session::set($data);

        echo '<pre>'; var_dump(Session::display()); echo '</pre>'; 
    }

    /**
     * Extract item from session then delete from the session, finally return the item.
     *
     * @since 1.0.0
     */
    public static function testPull() {

        Session::init();

        var_dump(Session::pull('name'));
    }

    /**
     * Get item from session.
     *
     * @since 1.0.0
     */
    public static function testGet() {

        Session::init();

        var_dump(Session::get('name'));
    }

    /**
     * Get item from session.
     *
     * @since 1.0.0
     */
    public static function testGetSecondKey() {

        Session::init();

        var_dump(Session::get('business', 'name'));
    }

    /**
     * ID
     *
     * @since 1.0.0
     */
    public static function testId() {

        Session::init();

        var_dump(Session::id());
    }

    /**
     * Regenerate session_id.
     *
     * @since 1.0.0
     */
    public static function testRegenerate() {

        Session::init();
        
        var_dump(Session::regenerate());
    }

    /**
     * Return the session array.
     *
     * @since 1.0.0
     */
    public static function testDisplay() {

        Session::init();
        
        echo '<pre>'; var_dump(Session::display()); echo '</pre>'; 
    }

    /**
     * Destroys one key session.
     *
     * @since 1.0.0
     */
    public static function testDestroyOneKeySession() {

        Session::init();
        
        Session::destroy('name'));

        echo '<pre>'; var_dump(Session::display()); echo '</pre>'; 
    }

    /**
     * Destroys all sessions.
     *
     * @since 1.0.0
     */
    public static function testDestroyAllSessions() {

        Session::init();
        
        Session::destroy();

        echo '<pre>'; var_dump(Session::display()); echo '</pre>'; 
    }

    /**
     * Clear all sessions for current prefix
     *
     * @since 1.0.0
     */
    public static function testDestroyAllSessionsWithPrefix() {

        Session::init();
        
        Session::destroy('jst', true);

        echo '<pre>'; var_dump(Session::display()); echo '</pre>'; 
    }
}
