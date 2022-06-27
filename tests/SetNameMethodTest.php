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

class SetNameMethodTest extends TestCase
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
    public function testShouldSetSessionName()
    {
        $this->session->setName('foo');

        $this->session->start();

        $this->assertEquals('foo', session_name());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailWhenSessionIsStarted()
    {
        $this->session->start();

        $this->expectException(SessionException::class);

        $this->session->setName('foo');
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        $facade->setName('foo');

        $this->session->start();

        $this->assertEquals('foo', session_name());
    }
}
