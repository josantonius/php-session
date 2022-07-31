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
use Josantonius\Session\Exceptions\SessionException;
use Josantonius\Session\Facades\Session as SessionFacade;

class DestroyMethodTest extends TestCase
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
    public function testShouldDestroySession(): void
    {
        $this->session->start();

        $this->assertEquals(PHP_SESSION_ACTIVE, session_status());

        $this->assertTrue($this->session->destroy());

        $this->assertEquals(PHP_SESSION_NONE, session_status());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldDestroySessionWhenNativeSessionWasStarted(): void
    {
        session_start();

        $this->assertEquals(PHP_SESSION_ACTIVE, session_status());

        $this->assertTrue($this->session->destroy());

        $this->assertEquals(PHP_SESSION_NONE, session_status());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailIfSessionIsUnstarted(): void
    {
        $this->expectException(SessionException::class);

        $this->session->destroy();
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        session_start();

        $this->assertTrue($facade->destroy());
    }
}
