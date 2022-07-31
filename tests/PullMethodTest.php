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

class PullMethodTest extends TestCase
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
    public function testShouldPullAttributeAndReturnTheValueIfExists(): void
    {
        $this->session->start();

        $_SESSION['foo'] = 'bar';

        $this->assertEquals('bar', $this->session->pull('foo'));

        $this->assertArrayNotHasKey('foo', $_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldReturnDefaultValueIfAttributeNotExists(): void
    {
        $this->session->start();

        $this->assertNull($this->session->pull('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldReturnCustomDefaultValueIfAttributeNotExists(): void
    {
        $this->session->start();

        $this->assertEquals('bar', $this->session->pull('foo', 'bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailIfSessionIsUnstarted()
    {
        $this->expectException(SessionException::class);

        $this->session->pull('foo');
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        $this->session->start();

        $this->assertEquals('bar', $facade->pull('foo', 'bar'));
    }
}
