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

use Josantonius\Session\Session;
use Josantonius\Session\Facades\Session as SessionFacade;
use Josantonius\Session\Exceptions\SessionNotStartedException;

class RegenerateIdMethodTest extends SessionTestCase
{
    private Session $session;

    public function setUp(): void
    {
        parent::setUp();

        $this->session = new Session();
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @dataProvider regenerationProvider
     */
    public function test_should_preserve_native_regeneration_semantics(
        ?bool $deleteOldSession,
        bool $native
    ): void {
        $this->assertTrue($this->session->start(['use_strict_mode' => true]));
        $this->session->set('cart', ['item' => 2]);
        $oldId = $this->session->getId();
        $oldFile = session_save_path() . '/sess_' . $oldId;

        $regenerate = $native ? 'session_regenerate_id' : [$this->session, 'regenerateId'];
        $result = $deleteOldSession === null ? $regenerate() : $regenerate($deleteOldSession);

        $this->assertTrue($result);
        $newId = $this->session->getId();
        $this->assertNotSame($oldId, $newId);
        $this->assertNotSame('', $newId);
        $this->assertSame(PHP_SESSION_ACTIVE, session_status());
        $this->assertSame(['cart' => ['item' => 2]], $this->session->all());
        $this->session->set('authenticated', true);
        $this->assertTrue(session_write_close());
        clearstatcache();
        $this->assertSame($deleteOldSession !== true, is_file($oldFile));

        // Verify persistence, not just the in-memory session array.
        $_SESSION = [];
        session_id($newId);
        $this->assertTrue(session_start());
        $this->assertSame(['cart' => ['item' => 2], 'authenticated' => true], $_SESSION);
        $this->assertTrue(session_write_close());

        if ($deleteOldSession !== true) {
            $_SESSION = [];
            session_id($oldId);
            $this->assertTrue(session_start());
            $this->assertSame($oldId, session_id());
            $this->assertSame(['cart' => ['item' => 2]], $_SESSION);
        }
    }

    public function regenerationProvider(): array
    {
        return [
            'wrapper default retains old data' => [null, false],
            'wrapper false retains old data' => [false, false],
            'wrapper true deletes old data' => [true, false],
            'native default retains old data' => [null, true],
            'native false retains old data' => [false, true],
            'native true deletes old data' => [true, true],
        ];
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_fail_when_regenerate_id_if_session_is_unstarted(): void
    {
        $this->expectException(SessionNotStartedException::class);

        $this->session->regenerateId();
    }

    /**
     * @runInSeparateProcess
     */
    public function test_should_be_available_from_the_facade(): void
    {
        $facade = new SessionFacade();

        $this->session->start();

        $this->assertTrue($facade->regenerateId());
    }
}
