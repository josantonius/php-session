<?php

/*
 * This file is part of https://github.com/josantonius/php-session repository.
 *
 * (c) Josantonius <hello@josantonius.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Josantonius\Session\Tests;

use Josantonius\Session\Session;
use Josantonius\Session\Facades\Session as SessionFacade;
use PHPUnit\Framework\TestCase;

class GetMethodTest extends TestCase
{
    private Session $session;

    public function setUp(): void
    {
        parent::setUp();

        $this->session = new Session();
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetAttributeIfExists()
    {
        $this->session->start();

        $this->session->set('foo', 'bar');

        $this->assertEquals('bar', $this->session->get('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetDefaultValueIfNotExists()
    {
        $this->session->start();

        $this->assertNull($this->session->get('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetCustomDefaultValueIfNotExists()
    {
        $this->session->start();

        $this->assertEquals('bar', $this->session->get('foo', 'bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetAttributeDefinedOutsideLibrary()
    {
        session_start();

        $_SESSION['foo'] = 'bar';

        $this->assertEquals('bar', $this->session->get('foo', 'bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        $this->assertNull($facade->get('foo'));
    }
}
