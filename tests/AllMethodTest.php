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

class AllMethodTest extends TestCase
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
    public function test_should_get_all_attributes(): void
    {
        $this->session->start();

        $this->session->set('foo', 'bar');

        $this->assertEquals(['foo' => 'bar'], $this->session->all());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_get_all_attributes_defined_outside_library(): void
    {
        session_start();

        $_SESSION['foo'] = 'bar';

        $this->assertEquals(['foo' => 'bar'], $this->session->all());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_return_empty_array_when_unstarted_session(): void
    {
        $this->assertIsArray($this->session->all());
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $this->assertIsArray($facade->all());
    }
}
