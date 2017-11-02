<?php
/**
 * PHP library for handling sessions.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 (c) Josantonius - PHP-Session
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Session
 * @since     1.1.3
 */

namespace Josantonius\Session;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for Session library.
 *
 * @since 1.1.3
 */
class SessionTest extends TestCase
{
    /**
     * Set prefix for sessions.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testSetPrefix()
    {
        $this->assertTrue(Session::setPrefix('ses_'));
    }

    /**
     * Start session.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testInit()
    {
        $this->assertTrue(Session::init());
    }

    /**
     * Add value to a session.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testSet()
    {
        $this->assertTrue(Session::set('name', 'Joseph'));
    }

    /**
     * Add multiple value to sessions.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testSetMultiple()
    {
        $data = [

            'name'     => 'Joseph',
            'age'      => '28',
            'business' => ['name' => 'Company'],
        ];

        $this->assertTrue(Session::set($data));
    }

    /**
     * Extract session item, delete session item and finally return the item.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPull()
    {
        $this->assertContains('28', Session::pull('age'));
    }

    /**
     * Extract inexistent session item.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPullNonExistent()
    {
        $this->assertNull(Session::pull('???'));
    }

    /**
     * Get item from session.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGet()
    {
        $this->assertContains('Joseph', Session::get('name'));
    }

    /**
     * Get inexistent session item from session.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetNonExistent()
    {
        $this->assertNull(Session::get('age'));
    }

    /**
     * Get item from session entering two indexes.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetWithSecondKey()
    {
        $this->assertContains('Company', Session::get('business', 'name'));
    }

    /**
     * Get inexistent item from session entering two indexes.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetWithSecondKeyNonExistent()
    {
        $this->assertNull(Session::get('???', '???'));
    }

    /**
     * Return the session array.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetAll()
    {
        $this->assertInternalType('array', Session::get());
    }

    /**
     * Get session id.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testId()
    {
        $this->assertInternalType('string', Session::id());
    }

    /**
     * Regenerate session_id.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testRegenerate()
    {
        $this->assertTrue(Session::init());

        $this->assertInternalType('string', Session::regenerate());
    }

    /**
     * Validate that the id was regenerate.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testValidateRegenerateId()
    {
        $this->assertTrue(Session::init());

        $actualID = Session::id();

        $this->assertInternalType('string', $actualID);

        $newID = Session::regenerate();

        $this->assertInternalType('string', $newID);

        $this->assertNotEquals($actualID, $newID);
    }

    /**
     * Destroys one key session.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testDestroy()
    {
        $this->assertTrue(Session::init());

        $this->assertTrue(Session::set('name', 'Joseph'));

        $this->assertContains('Joseph', Session::get('name'));

        $this->assertTrue(Session::destroy('name'));

        $this->assertNull(Session::get('name'));

        $this->assertTrue(Session::destroy('ses_', true));

        $this->assertTrue(Session::destroy());
    }
}
