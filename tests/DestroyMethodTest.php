<?php

/*
 * This file is part of https://github.com/josantonius/php-session repository.
 *
 * (c) Josantonius <hello@josantonius.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */

namespace Josantonius\Session\Tests;

use PHPUnit\Framework\TestCase;
use Josantonius\Session\Session;
use Josantonius\Session\Facades\Session as SessionFacade;
use Josantonius\Session\Exceptions\SessionNotStartedException;

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
    public function test_should_destroy_session(): void
    {
        $this->session->start();

        $this->assertEquals(PHP_SESSION_ACTIVE, session_status());

        $this->assertTrue($this->session->destroy());

        $this->assertEquals(PHP_SESSION_NONE, session_status());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_destroy_session_when_native_session_was_started(): void
    {
        session_start();

        $this->assertEquals(PHP_SESSION_ACTIVE, session_status());

        $this->assertTrue($this->session->destroy());

        $this->assertEquals(PHP_SESSION_NONE, session_status());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_fail_if_session_is_unstarted(): void
    {
        $this->expectException(SessionNotStartedException::class);

        $this->session->destroy();
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        session_start();

        $this->assertTrue($facade->destroy());
    }
}
