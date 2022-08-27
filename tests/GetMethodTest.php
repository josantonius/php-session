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

class GetMethodTest extends TestCase
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
    public function test_should_get_attribute_if_exists(): void
    {
        $this->session->start();

        $this->session->set('foo', 'bar');

        $this->assertEquals('bar', $this->session->get('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_get_default_value_if_not_exists(): void
    {
        $this->session->start();

        $this->assertNull($this->session->get('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_get_custom_default_value_if_not_exists(): void
    {
        $this->session->start();

        $this->assertEquals('bar', $this->session->get('foo', 'bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_get_attribute_defined_outside_library(): void
    {
        session_start();

        $_SESSION['foo'] = 'bar';

        $this->assertEquals('bar', $this->session->get('foo', 'bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $this->assertNull($facade->get('foo'));
    }
}
