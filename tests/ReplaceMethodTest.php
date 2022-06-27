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

use Josantonius\Session\Exceptions\SessionException;
use Josantonius\Session\Session;
use Josantonius\Session\Facades\Session as SessionFacade;
use PHPUnit\Framework\TestCase;

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
    public function testShouldAddAttributesIfNotExist()
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
    public function testShouldReplaceAttributesIfExist()
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
    public function testShouldFailIfSessionIsUnstarted()
    {
        $this->expectException(SessionException::class);

        $this->session->replace(['foo' => 'val']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testShouldBeAvailableFromTheFacade()
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
