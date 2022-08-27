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

class HasMethodTest extends TestCase
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
    public function test_should_check_if_attribute_exists(): void
    {
        $this->session->start();

        $this->session->set('foo', 'bar');

        $this->assertTrue($this->session->has('foo'));

        $this->assertFalse($this->session->has('bar'));
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_check_attribute_defined_outside_library(): void
    {
        session_start();

        $_SESSION['foo'] = 'bar';

        $this->assertTrue($this->session->has('foo'));
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        session_start();

        $_SESSION['foo'] = 'bar';

        $this->assertTrue($facade->has('foo'));
    }
}
