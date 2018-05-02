<?php
/**
 * PHP library for handling sessions.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - PHP-Session
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
     * Session instance.
     *
     * @since 1.1.5
     *
     * @var object
     */
    protected $Session;

    /**
     * Set up.
     *
     * @since 1.1.5
     */
    public function setUp()
    {
        parent::setUp();

        $this->Session = new Session;
    }

    /**
     * Check if it is an instance of Session.
     *
     * @since 1.1.5
     */
    public function testIsInstanceOfSession()
    {
        $this->assertInstanceOf('Josantonius\Session\Session', $this->Session);
    }

    /**
     * Set prefix for sessions.
     */
    public function testSetPrefix()
    {
        $session = $this->Session;

        $this->assertTrue($session::setPrefix('ses_'));
    }

    /**
     * Get prefix for sessions.
     *
     * @since 1.1.6
     */
    public function testGetPrefix()
    {
        $session = $this->Session;
        $session::setPrefix('ses_');

        $this->assertSame('ses_', $session::getPrefix());
    }

    /**
     * Start session.
     *
     * @runInSeparateProcess
     */
    public function testInit()
    {
        $session = $this->Session;

        $this->assertTrue($session::init());
        $this->assertFalse($session::init());
    }
	
	/**
     * Start session with a max lifetime.
     *
     * @runInSeparateProcess
     */
    public function testInitLifeTime()
    {
        $session = $this->Session;

        $this->assertTrue($session::init(10));
        $this->assertFalse($session::init(10));
    }

    /**
     * Add value to a session.
     */
    public function testSet()
    {
        $session = $this->Session;

        $this->assertTrue($session::set('name', 'Joseph'));
    }

    /**
     * Add multiple value to sessions.
     */
    public function testSetMultiple()
    {
        $session = $this->Session;
        $data = [
            'name' => 'Joseph',
            'age' => '28',
            'business' => ['name' => 'Company'],
        ];

        $this->assertTrue($session::set($data));
    }

    /**
     * Extract session item, delete session item and finally return the item.
     */
    public function testPull()
    {
        $session = $this->Session;

        $this->assertContains('28', $session::pull('age'));
    }

    /**
     * Extract inexistent session item.
     */
    public function testPullNonExistent()
    {
        $session = $this->Session;

        $this->assertNull($session::pull('???'));
    }

    /**
     * Get item from session.
     */
    public function testGet()
    {
        $session = $this->Session;

        $this->assertContains('Joseph', $session::get('name'));
    }

    /**
     * Get inexistent session item from session.
     */
    public function testGetNonExistent()
    {
        $session = $this->Session;

        $this->assertNull($session::get('age'));
    }

    /**
     * Get item from session entering two indexes.
     */
    public function testGetWithSecondKey()
    {
        $session = $this->Session;

        $this->assertContains('Company', $session::get('business', 'name'));
    }

    /**
     * Get inexistent item from session entering two indexes.
     */
    public function testGetWithSecondKeyNonExistent()
    {
        $session = $this->Session;

        $this->assertNull($session::get('???', '???'));
    }

    /**
     * Return the session array.
     */
    public function testGetAll()
    {
        $session = $this->Session;

        $this->assertInternalType('array', $session::get());
    }

    /**
     * Get session id.
     */
    public function testId()
    {
        $session = $this->Session;

        $this->assertInternalType('string', $session::id());
    }

    /**
     * Regenerate session_id.
     *
     * @runInSeparateProcess
     */
    public function testRegenerate()
    {
        $session = $this->Session;

        $this->assertTrue($session::init());

        $this->assertInternalType('string', $session::regenerate());
    }

    /**
     * Validate that the id was regenerate.
     *
     * @runInSeparateProcess
     */
    public function testValidateRegenerateId()
    {
        $session = $this->Session;

        $this->assertTrue($session::init());

        $actualID = $session::id();

        $this->assertInternalType('string', $actualID);

        $newID = $session::regenerate();

        $this->assertInternalType('string', $newID);

        $this->assertNotSame($actualID, $newID);
    }

    /**
     * Destroys one key session.
     *
     * @runInSeparateProcess
     */
    public function testDestroy()
    {
        $session = $this->Session;

        $this->assertTrue($session::init());

        $this->assertTrue($session::set('name', 'Joseph'));

        $this->assertContains('Joseph', $session::get('name'));

        $this->assertTrue($session::destroy('name'));

        $this->assertNull($session::get('name'));

        $this->assertTrue($session::destroy('ses_', true));

        $this->assertTrue($session::set('name', 'Joseph'));

        $this->assertTrue($session::destroy('name', true));

        $this->assertTrue($session::destroy());
    }
}
