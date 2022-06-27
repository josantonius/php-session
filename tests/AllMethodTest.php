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

use Josantonius\Session\Session;
use Josantonius\Session\Facades\Session as SessionFacade;
use PHPUnit\Framework\TestCase;

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
    public function testShouldGetAllAttributes()
    {
        $this->session->start();

        $this->session->set('foo', 'bar');

        $this->assertEquals(['foo' => 'bar'], $this->session->all());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldGetAllAttributesDefinedOutsideLibrary()
    {
        session_start();

        $_SESSION['foo'] = 'bar';

        $this->assertEquals(['foo' => 'bar'], $this->session->all());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldReturnEmptyArrayWhenUnstartedSession()
    {
        $this->assertIsArray($this->session->all());
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
    {
        $facade = new SessionFacade();

        $this->assertIsArray($facade->all());
    }
}
