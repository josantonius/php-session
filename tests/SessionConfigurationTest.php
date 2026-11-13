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

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class SessionConfigurationTest extends SessionTestCase
{
    /**
     * @dataProvider configurationProvider
     */
    public function test_should_match_native_effective_configuration(
        array $configured,
        array $options
    ): void {
        $expected = array_replace($configured, $options);
        $native = $this->configurationAfterStart($configured, $options, true);
        $wrapped = $this->configurationAfterStart($configured, $options, false);

        $this->assertSame($native, $wrapped);
        $this->assertSame(array_map('strval', $expected), $wrapped['ini']);
        $expectedCookies = [
            'lifetime' => (int) $expected['cookie_lifetime'],
            'path' => $expected['cookie_path'],
            'domain' => $expected['cookie_domain'],
            'secure' => (bool) $expected['cookie_secure'],
            'httponly' => (bool) $expected['cookie_httponly'],
            'samesite' => $expected['cookie_samesite'],
        ];
        $this->assertSame(
            $expectedCookies,
            array_intersect_key($wrapped['cookies'], $expectedCookies)
        );
    }

    public function configurationProvider(): array
    {
        $configured = [
            'use_strict_mode' => '1',
            'use_only_cookies' => '1',
            'use_cookies' => '1',
            'cookie_httponly' => '1',
            'cookie_secure' => '1',
            'cookie_samesite' => 'Strict',
            'cookie_lifetime' => '1200',
            'cookie_path' => '/account',
            'cookie_domain' => 'example.test',
            'gc_maxlifetime' => '1800',
        ];

        return [
            'inherit configured security' => [$configured, []],
            'inherit explicit legacy settings' => [array_replace($configured, [
                'use_strict_mode' => '0',
                'cookie_httponly' => '0',
                'cookie_secure' => '0',
                'cookie_samesite' => '',
            ]), []],
            'override selected values, retain omitted options' => [$configured, [
                'cookie_lifetime' => 2400,
                'cookie_path' => '/checkout',
                'cookie_domain' => '',
                'cookie_samesite' => 'Lax',
            ]],
            'explicit options take precedence even when less restrictive' => [$configured, [
                'use_strict_mode' => false,
                'cookie_httponly' => false,
                'cookie_secure' => false,
                'cookie_samesite' => '',
                'use_cookies' => false,
            ]],
            'explicit hardening and cross-site cookie' => [array_replace($configured, [
                'use_strict_mode' => '0',
                'cookie_httponly' => '0',
                'cookie_secure' => '0',
                'cookie_samesite' => '',
            ]), [
                'use_strict_mode' => true,
                'cookie_httponly' => true,
                'cookie_secure' => true,
                'cookie_samesite' => 'None',
            ]],
        ];
    }

    public function test_should_inherit_native_cookie_parameters(): void
    {
        $expected = [
            'lifetime' => 600,
            'path' => '/members',
            'domain' => 'example.test',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Lax',
        ];
        $this->assertTrue(session_set_cookie_params($expected));
        $configured = session_get_cookie_params();
        $this->assertTrue((new Session())->start());
        $this->assertSame($expected, array_intersect_key($configured, $expected));
        $this->assertSame($configured, session_get_cookie_params());
    }

    /**
     * @dataProvider strictModeProvider
     */
    public function test_should_apply_strict_mode_with_the_files_handler(
        bool $strict,
        bool $native
    ): void {
        $this->assertSame('files', session_module_name());
        $uninitializedId = 'uninitialized-session';
        session_id($uninitializedId);
        $this->assertTrue($this->startSession(['use_strict_mode' => $strict], $native));
        $this->assertSame(!$strict, $uninitializedId === session_id());
        $this->assertNotSame('', session_id());

        // A stored ID must survive start(): strict mode is not automatic regeneration.
        $_SESSION['marker'] = 'persisted';
        $storedId = session_id();
        $this->assertTrue(session_write_close());
        $_SESSION = [];
        session_id($storedId);
        $this->assertTrue($this->startSession(['use_strict_mode' => $strict], $native));
        $this->assertSame($storedId, session_id());
        $this->assertSame('persisted', $_SESSION['marker']);
    }

    public function strictModeProvider(): array
    {
        return [
            'wrapper strict' => [true, false],
            'native strict' => [true, true],
            'wrapper permissive' => [false, false],
            'native permissive' => [false, true],
        ];
    }

    private function configurationAfterStart(
        array $configured,
        array $options,
        bool $native
    ): array {
        foreach ($configured as $name => $value) {
            $this->assertNotFalse(ini_set('session.' . $name, $value));
        }
        session_id('');
        $this->assertTrue($this->startSession($options, $native));
        $actual = [];
        foreach (array_keys($configured) as $name) {
            $actual[$name] = ini_get('session.' . $name);
        }
        $cookies = session_get_cookie_params();
        $this->assertTrue(session_destroy());

        return ['ini' => $actual, 'cookies' => $cookies];
    }

    private function startSession(array $options, bool $native): bool
    {
        return $native ? session_start($options) : (new Session())->start($options);
    }
}
