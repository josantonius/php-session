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
use Josantonius\Session\Exceptions\WrongSessionOptionException;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class PartitionedCookieTest extends SessionTestCase
{
    /**
     * @dataProvider partitionedOptionsProvider
     */
    public function test_should_validate_partitioned_cookie_options_for_the_php_version(
        bool $configured,
        array $options
    ): void {
        $native = $this->startAndCapture('session_start', $configured, $options);
        $wrapped = $this->startAndCapture([new Session(), 'start'], $configured, $options);
        $facade = $this->startAndCapture([SessionFacade::class, 'start'], $configured, $options);

        $this->assertSame($wrapped, $facade);

        if (PHP_VERSION_ID < 80500 && array_key_exists('cookie_partitioned', $options)) {
            $this->assertTrue($native['result']);
            $this->assertCount(1, $native['warnings']);
            $this->assertSame(E_WARNING, $native['warnings'][0]['severity']);
            $this->assertStringContainsString(
                'cookie_partitioned',
                $native['warnings'][0]['message']
            );
            $this->assertSame([
                'class' => WrongSessionOptionException::class,
                'message' => "Session->start(): Setting option 'cookie_partitioned' failed.",
            ], $wrapped['exception']);
            $this->assertNull($wrapped['result']);
            $this->assertSame(PHP_SESSION_NONE, $wrapped['status']);
            $this->assertSame('', session_id());
            $this->assertSame([], $wrapped['warnings']);
            $this->assertArrayNotHasKey('partitioned', $wrapped['cookies']);
            $this->assertTrue($wrapped['cookies']['secure']);
            return;
        }

        $this->assertSame($native, $wrapped);
        $this->assertNull($wrapped['exception']);

        if (PHP_VERSION_ID < 80500) {
            $this->assertTrue($wrapped['result']);
            $this->assertSame(PHP_SESSION_ACTIVE, $wrapped['status']);
            $this->assertArrayNotHasKey('partitioned', $wrapped['cookies']);
            $this->assertFalse($wrapped['ini']);
            $this->assertSame([], $wrapped['warnings']);
            return;
        }

        $partitioned = $options['cookie_partitioned'] ?? $configured;
        $secure = $options['cookie_secure'] ?? true;
        $valid = !$partitioned || $secure;
        $this->assertSame($partitioned, $wrapped['cookies']['partitioned']);
        $this->assertSame($secure, $wrapped['cookies']['secure']);
        $this->assertSame($partitioned, (bool) $wrapped['ini']);
        $this->assertSame($valid, $wrapped['result']);
        $this->assertSame($valid ? PHP_SESSION_ACTIVE : PHP_SESSION_NONE, $wrapped['status']);
        $this->assertCount($valid ? 0 : 1, $wrapped['warnings']);
        foreach ($wrapped['warnings'] as $warning) {
            $this->assertSame(E_WARNING, $warning['severity']);
            $this->assertStringContainsString('secure', $warning['message']);
        }
    }

    public function partitionedOptionsProvider(): array
    {
        return [
            'omitted option does not enable partitioning' => [false, []],
            'omitted option preserves supported PHP configuration' => [true, []],
            'explicit true overrides disabled configuration' => [false, [
                'cookie_partitioned' => true,
            ]],
            'explicit false overrides enabled configuration' => [true, [
                'cookie_partitioned' => false,
            ]],
            'explicit partitioning preserves native secure requirement' => [false, [
                'cookie_partitioned' => true,
                'cookie_secure' => false,
            ]],
            'inherited partitioning preserves native secure requirement' => [true, [
                'cookie_secure' => false,
            ]],
            'disabled partitioning does not force secure cookies' => [true, [
                'cookie_partitioned' => false,
                'cookie_secure' => false,
            ]],
        ];
    }

    private function startAndCapture(callable $start, bool $configured, array $options): array
    {
        session_id('');
        $this->assertTrue(session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'None',
        ]));
        if (PHP_VERSION_ID >= 80500) {
            $this->assertNotFalse(ini_set('session.cookie_partitioned', $configured ? '1' : '0'));
        }

        $warnings = [];
        $result = null;
        $failure = null;
        set_error_handler(function (int $severity, string $message) use (&$warnings): bool {
            $warnings[] = ['severity' => $severity, 'message' => $message];
            return true;
        }, E_WARNING);
        try {
            $result = $start($options);
        } catch (WrongSessionOptionException $exception) {
            $failure = ['class' => get_class($exception), 'message' => $exception->getMessage()];
        } finally {
            restore_error_handler();
        }

        $actual = [
            'result' => $result,
            'status' => session_status(),
            'cookies' => session_get_cookie_params(),
            'ini' => ini_get('session.cookie_partitioned'),
            'warnings' => $warnings,
            'exception' => $failure,
        ];
        if (session_status() === PHP_SESSION_ACTIVE) {
            $this->assertTrue(session_destroy());
        }

        return $actual;
    }
}
