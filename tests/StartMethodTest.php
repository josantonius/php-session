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

class StartMethodTest extends TestCase
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
    public function testShouldStartSession(): void
    {
        $this->assertTrue($this->session->start());

        $this->assertEquals(PHP_SESSION_ACTIVE, session_status());

        $this->assertTrue(isset($_SESSION));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldAcceptOptions(): void
    {
        $this->session->start(['cookie_lifetime' => 8000]);

        $this->assertEquals(8000, ini_get('session.cookie_lifetime'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailWithWrongOptions(): void
    {
        $this->expectException(SessionException::class);

        $this->session->start(['foo' => 'bar']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailWhenSessionIsAlreadyActive(): void
    {
        $this->session->start();

        $this->expectException(SessionException::class);

        $this->session->start();
    }

    public function testShouldFailWhenHeadersSent(): void
    {
        $this->expectException(SessionException::class);

        $this->session->start();
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        $this->assertTrue($facade->start());
    }
}
