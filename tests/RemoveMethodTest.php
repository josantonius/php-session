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

class RemoveMethodTest extends TestCase
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
    public function testShouldRemoveAttributeIfExist(): void
    {
        $this->session->start();

        $_SESSION['foo'] = 'bar';

        $this->session->remove('foo');

        $this->assertEquals([], $_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldRemoveAttributeEvenIfNotExist(): void
    {
        $this->session->start();

        $this->session->remove('foo');

        $this->assertEquals([], $_SESSION);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldFailIfSessionIsUnstarted(): void
    {
        $this->expectException(SessionException::class);

        $this->session->remove('foo');
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade(): void
    {
        $facade = new SessionFacade();

        $this->session->start();

        $facade->remove('foo');

        $this->assertEquals([], $_SESSION);
    }
}
