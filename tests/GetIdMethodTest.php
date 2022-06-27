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

class GetIdMethodTest extends TestCase
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
    public function testShouldGetSessionId()
    {
        $this->session->start();

        $this->assertEquals(session_id(), $this->session->getId());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetSessionIdIfNativeSessionWasStarted()
    {
        session_start();

        $this->assertEquals(session_id(), $this->session->getId());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldReturnEmptyStringIfSessionIsUnstarted()
    {
        $this->assertEquals('', $this->session->getId());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        $this->assertEquals('', $facade->getId());
    }
}
