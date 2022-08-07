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

class SetMethodTest extends TestCase
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
    public function testShouldSetAttributeIfSessionWasStarted(): void
    {
        $this->session->start();

        $this->session->set('foo', 'bar');

        $this->assertEquals('bar', $_SESSION['foo']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldSetAttributeIfNativeSessionWasStarted(): void
    {
        session_start();

        $this->session->set('foo', 'bar');

        $this->assertEquals('bar', $_SESSION['foo']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailIfSessionIsUnstarted(): void
    {
        $this->expectException(SessionNotStartedException::class);

        $this->session->set('foo', 'bar');
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        session_start();

        $facade->set('foo', 'bar');

        $this->assertEquals('bar', $_SESSION['foo']);
    }
}
