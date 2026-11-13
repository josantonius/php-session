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

/**
 * Isolated storage for tests that inspect native session persistence.
 * Consumers must run their tests in separate processes to isolate PHP's INI state.
 */
abstract class SessionTestCase extends TestCase
{
    private string $sessionDirectory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->assertSame(PHP_SESSION_NONE, session_status());
        $directory = sys_get_temp_dir() . '/php-session-' . bin2hex(random_bytes(16));
        $this->assertTrue(mkdir($directory, 0700));
        $this->sessionDirectory = $directory;

        session_module_name('files');
        session_save_path($directory);
        session_name('SessionTest');
        session_id('');
        ini_set('session.serialize_handler', 'php');
        ini_set('session.gc_probability', '0');
        ini_set('session.cache_limiter', '');
        ini_set('session.use_cookies', '1');
        ini_set('session.use_only_cookies', '1');
        $_COOKIE = [];
        $_SESSION = [];
    }

    protected function tearDown(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_write_close();
        }

        if (isset($this->sessionDirectory)) {
            foreach (glob($this->sessionDirectory . '/sess_*') as $file) {
                unlink($file);
            }
            rmdir($this->sessionDirectory);
        }

        parent::tearDown();
    }
}
