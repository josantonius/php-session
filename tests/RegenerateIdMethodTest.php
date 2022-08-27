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

class RegenerateIdMethodTest extends TestCase
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
    public function test_should_regenerate_session_id_without_deleting_old_session(): void
    {
        $this->session->start();

        $sessionId = session_id();

        $this->assertTrue($this->session->regenerateId());

        $this->assertNotEquals($sessionId, session_id());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_regenerate_session_id_deleting_old_session(): void
    {
        $this->session->start();

        $sessionId = session_id();

        $this->assertTrue($this->session->regenerateId());

        $this->assertNotEquals($sessionId, session_id());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_fail_when_regenerate_id_if_session_is_unstarted(): void
    {
        $this->expectException(SessionNotStartedException::class);

        $this->session->regenerateId();
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $this->session->start();

        $this->assertTrue($facade->regenerateId());
    }
}
