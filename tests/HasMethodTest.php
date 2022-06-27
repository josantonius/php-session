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

class HasMethodTest extends TestCase
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
    public function testShouldCheckIfAttributeExists()
    {
        $this->session->start();

        $this->session->set('foo', 'bar');

        $this->assertTrue($this->session->has('foo'));

        $this->assertFalse($this->session->has('bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldCheckAttributeDefinedOutsideLibrary()
    {
        session_start();

        $_SESSION['foo'] = 'bar';

        $this->assertTrue($this->session->has('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        session_start();

        $_SESSION['foo'] = 'bar';

        $this->assertTrue($facade->has('foo'));
    }
}
