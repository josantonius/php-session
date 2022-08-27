<?php

/*
 * This file is part of https://github.com/josantonius/php-session repository.
 *
 * (c) Josantonius <hello@josantonius.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */

namespace Josantonius\Session\Tests;

use PHPUnit\Framework\TestCase;
use Josantonius\Session\Session;
use Josantonius\Session\Exceptions\SessionNotStartedException;
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
    public function test_should_pull_attribute_and_return_the_value_if_exists(): void
    {
        $this->session->start();

        $_SESSION['foo'] = 'bar';

        $this->assertEquals('bar', $this->session->pull('foo'));

        $this->assertArrayNotHasKey('foo', $_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_return_default_value_if_attribute_not_exists(): void
    {
        $this->session->start();

        $this->assertNull($this->session->pull('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_return_custom_default_value_if_attribute_not_exists(): void
    {
        $this->session->start();

        $this->assertEquals('bar', $this->session->pull('foo', 'bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_fail_if_session_is_unstarted()
    {
        $this->expectException(SessionNotStartedException::class);

        $this->session->pull('foo');
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $this->session->start();

        $this->assertEquals('bar', $facade->pull('foo', 'bar'));
    }
}
