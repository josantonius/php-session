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

class GetNameMethodTest extends TestCase
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
    public function testShouldGetSessionName()
    {
        $this->session->start();

        $this->assertEquals(session_name(), $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetSessionNameIfNativeSessionWasStarted()
    {
        session_start();

        $this->assertEquals(session_name(), $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldReturnEmptyStringIfSessionIsUnstarted()
    {
        $this->assertEquals('PHPSESSID', $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        $this->assertEquals('PHPSESSID', $facade->getName());
    }
}
