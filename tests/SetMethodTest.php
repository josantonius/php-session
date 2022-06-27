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
    public function testShouldSetAttributeIfSessionWasStarted()
    {
        $this->session->start();

        $this->session->set('foo', 'bar');

        $this->assertEquals('bar', $_SESSION['foo']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldSetAttributeIfNativeSessionWasStarted()
    {
        session_start();

        $this->session->set('foo', 'bar');

        $this->assertEquals('bar', $_SESSION['foo']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailIfSessionIsUnstarted()
    {
        $this->expectException(SessionException::class);

        $this->session->set('foo', 'bar');
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        session_start();

        $facade->set('foo', 'bar');

        $this->assertEquals('bar', $_SESSION['foo']);
    }
}
