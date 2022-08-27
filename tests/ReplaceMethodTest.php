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
use Josantonius\Session\Facades\Session as SessionFacade;
use Josantonius\Session\Exceptions\SessionNotStartedException;

class ReplaceMethodTest extends TestCase
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
    public function test_should_add_attributes_if_not_exist(): void
    {
        $this->session->start();

        $_SESSION['bar'] = 'foo';

        $this->session->replace(['foo' => 'bar']);

        $this->assertEquals([
            'bar' => 'foo',
            'foo' => 'bar',
        ], $_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_replace_attributes_if_exist(): void
    {
        $this->session->start();

        $_SESSION['foo'] = 'bar';
        $_SESSION['bar'] = 'foo';

        $this->session->replace(['foo' => 'val']);

        $this->assertEquals([
            'foo' => 'val',
            'bar' => 'foo',
        ], $_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_fail_if_session_is_unstarted(): void
    {
        $this->expectException(SessionNotStartedException::class);

        $this->session->replace(['foo' => 'val']);
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $this->session->start();

        $_SESSION['bar'] = 'foo';

        $facade->replace(['foo' => 'bar']);

        $this->assertEquals([
            'bar' => 'foo',
            'foo' => 'bar',
        ], $_SESSION);
    }
}
