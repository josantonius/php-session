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
use Josantonius\Session\Exceptions\SessionNotStartedException;

class ClearMethodTest extends TestCase
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
    public function testShouldClearSession(): void
    {
        $this->session->start();

        $_SESSION['bar'] = 'foo';

        $this->session->clear();

        $this->assertEmpty($_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldClearSessionWhenNativeSessionWasStarted(): void
    {
        session_start();

        $_SESSION['bar'] = 'foo';

        $this->session->clear();

        $this->assertEmpty($_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailIfSessionIsUnstarted(): void
    {
        $this->expectException(SessionNotStartedException::class);

        $this->session->clear();
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        session_start();

        $_SESSION['bar'] = 'foo';

        $facade->clear();

        $this->assertEmpty($_SESSION);
    }
}
