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
        $actual = $this->Session;
        $this->assertInstanceOf('Josantonius\Session\Session', $actual);
    }

    /**
     * Set prefix for sessions.
     *
     * @since 1.1.3
     */
    public function testSetPrefix()
    {
        $this->assertTrue($this->Session->setPrefix('ses_'));
    }

    /**
     * Start session.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.3
     */
    public function testInit()
    {
        $this->assertTrue($this->Session->init());
    }

    /**
     * Add value to a session.
     *
     * @since 1.1.3
     */
    public function testSet()
    {
        $this->assertTrue($this->Session->set('name', 'Joseph'));
    }

    /**
     * Add multiple value to sessions.
     *
     * @since 1.1.3
     */
    public function testSetMultiple()
    {
        $data = [
            'name' => 'Joseph',
            'age' => '28',
            'business' => ['name' => 'Company'],
        ];

        $this->assertTrue($this->Session->set($data));
    }

    /**
     * Extract session item, delete session item and finally return the item.
     *
     * @since 1.1.3
     */
    public function testPull()
    {
        $this->assertContains('28', $this->Session->pull('age'));
    }

    /**
     * Extract inexistent session item.
     *
     * @since 1.1.3
     */
    public function testPullNonExistent()
    {
        $this->assertNull($this->Session->pull('???'));
    }

    /**
     * Get item from session.
     *
     * @since 1.1.3
     */
    public function testGet()
    {
        $this->assertContains('Joseph', $this->Session->get('name'));
    }

    /**
     * Get inexistent session item from session.
     *
     * @since 1.1.3
     */
    public function testGetNonExistent()
    {
        $this->assertNull($this->Session->get('age'));
    }

    /**
     * Get item from session entering two indexes.
     *
     * @since 1.1.3
     */
    public function testGetWithSecondKey()
    {
        $this->assertContains('Company', $this->Session->get('business', 'name'));
    }

    /**
     * Get inexistent item from session entering two indexes.
     *
     * @since 1.1.3
     */
    public function testGetWithSecondKeyNonExistent()
    {
        $this->assertNull($this->Session->get('???', '???'));
    }

    /**
     * Return the session array.
     *
     * @since 1.1.3
     */
    public function testGetAll()
    {
        $this->assertInternalType('array', $this->Session->get());
    }

    /**
     * Get session id.
     *
     * @since 1.1.3
     */
    public function testId()
    {
        $this->assertInternalType('string', $this->Session->id());
    }

    /**
     * Regenerate session_id.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.3
     */
    public function testRegenerate()
    {
        $this->assertTrue($this->Session->init());

        $this->assertInternalType('string', $this->Session->regenerate());
    }

    /**
     * Validate that the id was regenerate.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.3
     */
    public function testValidateRegenerateId()
    {
        $this->assertTrue($this->Session->init());

        $actualID = $this->Session->id();

        $this->assertInternalType('string', $actualID);

        $newID = $this->Session->regenerate();

        $this->assertInternalType('string', $newID);

        $this->assertNotSame($actualID, $newID);
    }

    /**
     * Destroys one key session.
     *
     * @runInSeparateProcess
     *
     * @since 1.1.3
     */
    public function testDestroy()
    {
        $this->assertTrue($this->Session->init());

        $this->assertTrue($this->Session->set('name', 'Joseph'));

        $this->assertContains('Joseph', $this->Session->get('name'));

        $this->assertTrue($this->Session->destroy('name'));

        $this->assertNull($this->Session->get('name'));

        $this->assertTrue($this->Session->destroy('ses_', true));

        $this->assertTrue($this->Session->destroy());
    }
}
