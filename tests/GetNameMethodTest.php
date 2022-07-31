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

class GetNameMethodTest extends TestCase
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
    public function testShouldGetSessionName(): void
    {
        $this->session->start();

        $this->assertEquals(session_name(), $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetSessionNameIfNativeSessionWasStarted(): void
    {
        session_start();

        $this->assertEquals(session_name(), $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldReturnEmptyStringIfSessionIsUnstarted(): void
    {
        $this->assertEquals('PHPSESSID', $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        $this->assertEquals('PHPSESSID', $facade->getName());
    }
}
