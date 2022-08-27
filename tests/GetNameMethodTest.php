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
    public function test_should_get_session_name(): void
    {
        $this->session->start();

        $this->assertEquals(session_name(), $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_get_session_name_if_native_session_was_started(): void
    {
        session_start();

        $this->assertEquals(session_name(), $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_return_empty_string_if_session_is_unstarted(): void
    {
        $this->assertEquals('PHPSESSID', $this->session->getName());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $this->assertEquals('PHPSESSID', $facade->getName());
    }
}
