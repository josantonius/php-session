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
    public function testShouldRegenerateSessionIdWithoutDeletingOldSession(): void
    {
        $this->session->start();

        $sessionId = session_id();

        $this->assertTrue($this->session->regenerateId());

        $this->assertNotEquals($sessionId, session_id());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldRegenerateSessionIdDeletingOldSession(): void
    {
        $this->session->start();

        $sessionId = session_id();

        $this->assertTrue($this->session->regenerateId());

        $this->assertNotEquals($sessionId, session_id());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailWhenRegenerateIdIfSessionIsUnstarted(): void
    {
        $this->expectException(SessionException::class);

        $this->session->regenerateId();
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        $this->session->start();

        $this->assertTrue($facade->regenerateId());
    }
}
