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
use Josantonius\Session\Exceptions\SessionStartedException;

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
    public function test_should_set_session_name(): void
    {
        $this->session->setName('foo');

        $this->session->start();

        $this->assertEquals('foo', session_name());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_fail_when_session_is_started(): void
    {
        $this->session->start();

        $this->expectException(SessionStartedException::class);

        $this->session->setName('foo');
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $facade->setName('foo');

        $this->session->start();

        $this->assertEquals('foo', session_name());
    }
}
