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

use PHPUnit\Framework\TestCase;
use Josantonius\Session\Session;
use Josantonius\Session\Facades\Session as SessionFacade;

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
    public function testShouldGetSessionId(): void
    {
        $this->session->start();

        $this->assertEquals(session_id(), $this->session->getId());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetSessionIdIfNativeSessionWasStarted(): void
    {
        session_start();

        $this->assertEquals(session_id(), $this->session->getId());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldReturnEmptyStringIfSessionIsUnstarted(): void
    {
        $this->assertEquals('', $this->session->getId());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        $this->assertEquals('', $facade->getId());
    }
}
