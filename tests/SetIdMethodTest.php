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

class SetIdMethodTest extends TestCase
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
    public function test_should_set_session_id(): void
    {
        $this->session->setId('foo');

        $this->session->start();

        $this->assertEquals('foo', session_id());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_fail_when_session_is_started(): void
    {
        $this->session->start();

        $this->expectException(SessionStartedException::class);

        $this->session->setId('foo');
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $facade->setId('foo');

        $this->session->start();

        $this->assertEquals('foo', session_id());
    }
}
