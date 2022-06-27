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

use Josantonius\Session\Exceptions\SessionException;
use Josantonius\Session\Session;
use Josantonius\Session\Facades\Session as SessionFacade;
use PHPUnit\Framework\TestCase;

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
    public function testShouldRegenerateSessionIdWithoutDeletingOldSession()
    {
        $this->session->start();

        $sessionId = session_id();

        $this->assertTrue($this->session->regenerateId());

        $this->assertNotEquals($sessionId, session_id());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldRegenerateSessionIdDeletingOldSession()
    {
        $this->session->start();

        $sessionId = session_id();

        $this->assertTrue($this->session->regenerateId());

        $this->assertNotEquals($sessionId, session_id());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailWhenRegenerateIdIfSessionIsUnstarted()
    {
        $this->expectException(SessionException::class);

        $this->session->regenerateId();
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        $this->session->start();

        $this->assertTrue($facade->regenerateId());
    }
}
