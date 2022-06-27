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
    public function testShouldClearSession()
    {
        $this->session->start();

        $_SESSION['bar'] = 'foo';

        $this->session->clear();

        $this->assertEmpty($_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldClearSessionWhenNativeSessionWasStarted()
    {
        session_start();

        $_SESSION['bar'] = 'foo';

        $this->session->clear();

        $this->assertEmpty($_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailIfSessionIsUnstarted()
    {
        $this->expectException(SessionException::class);

        $this->session->clear();
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        session_start();

        $_SESSION['bar'] = 'foo';

        $facade->clear();

        $this->assertEmpty($_SESSION);
    }
}
