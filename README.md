# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/session/v/stable)](https://packagist.org/packages/josantonius/session)
[![License](https://poser.pugx.org/josantonius/session/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/session/downloads)](https://packagist.org/packages/josantonius/session)
[![CI](https://github.com/josantonius/php-session/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-session/actions/workflows/ci.yml)
[![CodeCov](https://codecov.io/gh/josantonius/php-session/branch/main/graph/badge.svg)](https://codecov.io/gh/josantonius/php-session)
[![PSR1](https://img.shields.io/badge/PSR-1-f57046.svg)](https://www.php-fig.org/psr/psr-1/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR12](https://img.shields.io/badge/PSR-12-1abc9c.svg)](https://www.php-fig.org/psr/psr-12/)

PHP library for handling sessions.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Classes](#available-classes)
  - [Session Class](#session-class)
  - [Session Facade](#session-facade)
- [Exceptions Used](#exceptions-used)
- [Usage](#usage)
- [Security Best Practices](#security-best-practices)
- [Tests](#tests)
- [TODO](#todo)
- [Changelog](#changelog)
- [Contribution](#contribution)
- [Sponsor](#sponsor)
- [License](#license)

---

## Requirements

- Operating System: Linux | Windows.

- PHP: 8.0–8.5.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Session library**, simply:

```console
composer require josantonius/session
```

The previous command will only install the necessary files,
if you prefer to **download the entire source code** you can use:

```console
composer require josantonius/session --prefer-source
```

You can also **clone the complete repository** with Git:

```console
git clone https://github.com/josantonius/php-session.git
```

## Available Classes

### Session Class

`Josantonius\Session\Session`

Starts the session:

```php
/**
 * @throws HeadersSentException        if headers already sent.
 * @throws SessionStartedException     if session already started.
 * @throws WrongSessionOptionException if setting options failed.
 * 
 * @see https://php.net/session.configuration for List of available $options.
 */
public function start(array $options = []): bool;
```

Check if the session is started:

```php
public function isStarted(): bool;
```

Sets an attribute by name:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public function set(string $name, mixed $value): void;
```

Gets an attribute by name:

```php
/**
 * Optionally defines a default value when the attribute does not exist.
 */
public function get(string $name, mixed $default = null): mixed;
```

Gets all attributes:

```php
public function all(): array;
```

Check if an attribute exists in the session:

```php
public function has(string $name): bool;
```

Sets several attributes at once:

```php
/**
 * If attributes exist they are replaced, if they do not exist they are created.
 * 
 * @throws SessionNotStartedException if session was not started.
 */
public function replace(array $data): void;
```

Deletes an attribute by name and returns its value:

```php
/**
 * Optionally defines a default value when the attribute does not exist.
 * 
 * @throws SessionNotStartedException if session was not started.
 */
public function pull(string $name, mixed $default = null): mixed;
```

Deletes an attribute by name:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public function remove(string $name): void;
```

Free all session variables:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public function clear(): void;
```

Gets the session ID:

```php
public function getId(): string;
```

Sets the session ID:

```php
/**
 * @throws SessionStartedException if session already started.
 */
public function setId(string $sessionId): void;
```

Update the current session ID with a newly generated one:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public function regenerateId(bool $deleteOldSession = false): bool;
```

Gets the session name:

```php
public function getName(): string;
```

Sets the session name:

```php
/**
 * @throws SessionStartedException if session already started.
 */
public function setName(string $name): void;
```

Destroys the session:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public function destroy(): bool;
```

### Session Facade

`Josantonius\Session\Facades\Session`

Starts the session:

```php
/**
 * @throws HeadersSentException        if headers already sent.
 * @throws SessionStartedException     if session already started.
 * @throws WrongSessionOptionException if setting options failed.
 * 
 * @see https://php.net/session.configuration for List of available $options.
 */
public static function start(array $options = []): bool;
```

Check if the session is started:

```php
public static function isStarted(): bool;
```

Sets an attribute by name:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public static function set(string $name, mixed $value): void;
```

Gets an attribute by name:

```php
/**
 * Optionally defines a default value when the attribute does not exist.
 */
public static function get(string $name, mixed $default = null): mixed;
```

Gets all attributes:

```php
public static function all(): array;
```

Check if an attribute exists in the session:

```php
public static function has(string $name): bool;
```

Sets several attributes at once:

```php
/**
 * If attributes exist they are replaced, if they do not exist they are created.
 * 
 * @throws SessionNotStartedException if session was not started.
 */
public static function replace(array $data): void;
```

Deletes an attribute by name and returns its value:

```php
/**
 * Optionally defines a default value when the attribute does not exist.
 * 
 * @throws SessionNotStartedException if session was not started.
 */
public static function pull(string $name, mixed $default = null): mixed;
```

Deletes an attribute by name:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public static function remove(string $name): void;
```

Free all session variables:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public static function clear(): void;
```

Gets the session ID:

```php
public static function getId(): string;
```

Sets the session ID:

```php
/**
 * @throws SessionStartedException if session already started.
 */
public static function setId(string $sessionId): void;
```

Update the current session ID with a newly generated one:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public static function regenerateId(bool $deleteOldSession = false): bool;
```

Gets the session name:

```php
public static function getName(): string;
```

Sets the session name:

```php
/**
 * @throws SessionStartedException if session already started.
 */
public static function setName(string $name): void;
```

Destroys the session:

```php
/**
 * @throws SessionNotStartedException if session was not started.
 */
public static function destroy(): bool;
```

## Exceptions Used

```php
use Josantonius\Session\Exceptions\HeadersSentException;
use Josantonius\Session\Exceptions\SessionException;
use Josantonius\Session\Exceptions\SessionNotStartedException;
use Josantonius\Session\Exceptions\SessionStartedException;
use Josantonius\Session\Exceptions\WrongSessionOptionException;
```

## Usage

Example of use for this library:

### Starts the session without setting options

```php
use Josantonius\Session\Session;

$session = new Session();

$session->start();
```

```php
use Josantonius\Session\Facades\Session;

Session::start();
```

### Starts the session setting options

Recommended configuration for an HTTPS application. Adjust it to your application's needs;
see [Security Best Practices](#security-best-practices).

```php
use Josantonius\Session\Session;

$session = new Session();

$session->start([
    'use_strict_mode' => true,
    'use_only_cookies' => true,
    'use_cookies' => true,
    'cookie_httponly' => true,
    'cookie_secure' => true,
    'cookie_samesite' => 'Lax',
]);
```

```php
use Josantonius\Session\Facades\Session;

Session::start([
    'use_strict_mode' => true,
    'use_only_cookies' => true,
    'use_cookies' => true,
    'cookie_httponly' => true,
    'cookie_secure' => true,
    'cookie_samesite' => 'Lax',
]);
```

### Check if the session is started

```php
use Josantonius\Session\Session;

$session = new Session();

$session->isStarted();
```

```php
use Josantonius\Session\Facades\Session;

Session::isStarted();
```

### Sets an attribute by name

```php
use Josantonius\Session\Session;

$session = new Session();

$session->set('foo', 'bar');
```

```php
use Josantonius\Session\Facades\Session;

Session::set('foo', 'bar');
```

### Gets an attribute by name without setting a default value

```php
use Josantonius\Session\Session;

$session = new Session();

$session->get('foo'); // null if attribute does not exist
```

```php
use Josantonius\Session\Facades\Session;

Session::get('foo'); // null if attribute does not exist
```

### Gets an attribute by name setting a default value

```php
use Josantonius\Session\Session;

$session = new Session();

$session->get('foo', false); // false if attribute does not exist
```

```php
use Josantonius\Session\Facades\Session;

Session::get('foo', false); // false if attribute does not exist
```

### Gets all attributes

```php
use Josantonius\Session\Session;

$session = new Session();

$session->all();
```

```php
use Josantonius\Session\Facades\Session;

Session::all();
```

### Check if an attribute exists in the session

```php
use Josantonius\Session\Session;

$session = new Session();

$session->has('foo');
```

```php
use Josantonius\Session\Facades\Session;

Session::has('foo');
```

### Sets several attributes at once

```php
use Josantonius\Session\Session;

$session = new Session();

$session->replace(['foo' => 'bar', 'bar' => 'foo']);
```

```php
use Josantonius\Session\Facades\Session;

Session::replace(['foo' => 'bar', 'bar' => 'foo']);
```

### Deletes an attribute and returns its value or the default value if not exist

```php
use Josantonius\Session\Session;

$session = new Session();

$session->pull('foo'); // null if attribute does not exist
```

```php
use Josantonius\Session\Facades\Session;

Session::pull('foo'); // null if attribute does not exist
```

### Deletes an attribute and returns its value or the custom value if not exist

```php
use Josantonius\Session\Session;

$session = new Session();

$session->pull('foo', false); // false if attribute does not exist
```

```php
use Josantonius\Session\Facades\Session;

Session::pull('foo', false); // false if attribute does not exist
```

### Deletes an attribute by name

```php
use Josantonius\Session\Session;

$session = new Session();

$session->remove('foo');
```

```php
use Josantonius\Session\Facades\Session;

Session::remove('foo');
```

### Free all session variables

```php
use Josantonius\Session\Session;

$session = new Session();

$session->clear();
```

```php
use Josantonius\Session\Facades\Session;

Session::clear();
```

### Gets the session ID

```php
use Josantonius\Session\Session;

$session = new Session();

$session->getId();
```

```php
use Josantonius\Session\Facades\Session;

Session::getId();
```

### Sets the session ID

```php
use Josantonius\Session\Session;

$session = new Session();

$session->setId('foo');
```

```php
use Josantonius\Session\Facades\Session;

Session::setId('foo');
```

### Update the current session ID with a newly generated one

```php
use Josantonius\Session\Session;

$session = new Session();

$session->regenerateId();
```

```php
use Josantonius\Session\Facades\Session;

Session::regenerateId();
```

### Update the current session ID with a newly generated one deleting the old session

Immediate deletion can disrupt concurrent requests. Read
[Security Best Practices](#regenerate-ids-at-authentication-boundaries) before choosing this option.

```php
use Josantonius\Session\Session;

$session = new Session();

$session->regenerateId(true);
```

```php
use Josantonius\Session\Facades\Session;

Session::regenerateId(true);
```

### Gets the session name

```php
use Josantonius\Session\Session;

$session = new Session();

$session->getName();
```

```php
use Josantonius\Session\Facades\Session;

Session::getName();
```

### Sets the session name

```php
use Josantonius\Session\Session;

$session = new Session();

$session->setName('foo');
```

```php
use Josantonius\Session\Facades\Session;

Session::setName('foo');
```

### Destroys the session

```php
use Josantonius\Session\Session;

$session = new Session();

$session->destroy();
```

```php
use Josantonius\Session\Facades\Session;

Session::destroy();
```

## Security Best Practices

The library uses PHP's session configuration, including settings from `php.ini`, `ini_set()` and
`session_set_cookie_params()`. Options passed to `Session::start()` override those settings; omitted
options keep their current values. Choose settings that suit your environment and application.

### Session and cookie settings

- Enable `use_strict_mode` to reject uninitialized session IDs. The built-in `files` handler supports
  it. Custom handlers need ID validation through `SessionUpdateTimestampHandlerInterface::validateId()`
  or the `validate_sid` callback.
- Enable `cookie_httponly` to prevent JavaScript from reading the session cookie.
- Use HTTPS throughout the authenticated application and enable `cookie_secure` so the cookie is
  sent only over secure connections. Secure cookies generally do not work over plain HTTP.
- Keep `use_only_cookies` and `use_cookies` enabled to avoid exposing session IDs in URLs.

See PHP's [session security settings](https://www.php.net/manual/en/session.security.ini.php).

Choose `cookie_samesite` according to your application's navigation and authentication flows:

| Value | Behavior and compatibility |
| --- | --- |
| `Lax` | Sends cookies on same-site requests and top-level cross-site navigation using safe methods such as GET. Suitable for many applications, but can disrupt cross-site POST callbacks and embedded content. |
| `Strict` | Sends cookies only on same-site requests. Following a link from another site can initially omit the session cookie. |
| `None` | Allows cross-site cookies and requires `cookie_secure = true` in modern browsers. Older clients may interpret it differently, and third-party-cookie restrictions can still block it. |

Keep CSRF protection and XSS prevention in place regardless of cookie settings. Check the
[browser compatibility details](https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Set-Cookie#samesitesamesite-value)
for the clients your application supports.

### Optional partitioned cookies (PHP 8.5+)

`cookie_partitioned` enables cookies partitioned by top-level site (CHIPS), useful for some embedded
services. It requires PHP 8.5+ and `cookie_secure = true`. Omitting it keeps PHP's configured value.
On older PHP versions, supplying it throws `WrongSessionOptionException`, even as `false`.
See the [PHP reference](https://www.php.net/manual/en/session.configuration.php#ini.session.cookie-partitioned).

### Regenerate IDs at authentication boundaries

Call `regenerateId()` after verifying credentials or authorizing a privilege change, before saving
the new identity or privileges. `use_strict_mode` does not replace regeneration. `start()` does not
regenerate IDs automatically.

With an active `$session` and an `$authenticatedUserId` obtained by verifying credentials:

```php
if (!$session->regenerateId()) {
    throw new RuntimeException('Session ID regeneration failed.');
}

$session->set('user_id', $authenticatedUserId);
```

`regenerateId()` keeps the old session data; `regenerateId(true)` deletes it immediately, which can
disrupt concurrent requests or unstable connections. Manage old IDs with timestamps and a short,
bounded transition period. New privileges must belong only to the new ID, and access through the old
ID must expire independently of PHP's garbage collection. See PHP's
[session management guidance](https://www.php.net/manual/en/features.session.security.management.php)
and [regeneration examples](https://www.php.net/manual/en/function.session-regenerate-id.php).

### PHP versions and changing defaults

PHP defaults can change between releases. The accepted
[PHP 8.6 RFC](https://wiki.php.net/rfc/session_security_defaults) enables `use_strict_mode` and
`cookie_httponly` by default and sets `cookie_samesite` to `Lax`. Existing configuration can override
these values. Set the options your application needs explicitly, especially for custom session IDs
or cross-site authentication. See [Requirements](#requirements) for compatible PHP versions.

To report a vulnerability privately, see [SECURITY.md](SECURITY.md).

## Tests

To run [tests](tests) you just need [composer](http://getcomposer.org/download/)
and to execute the following:

```console
git clone https://github.com/josantonius/php-session.git
```

```console
cd php-session
```

```console
composer install
```

Run unit tests with [PHPUnit](https://phpunit.de/):

```console
composer phpunit
```

Run code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

```console
composer phpcs
```

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

```console
composer phpmd
```

Run all previous tests:

```console
composer tests
```

## TODO

- [ ] Add new feature
- [ ] Improve tests
- [ ] Improve documentation
- [ ] Refactor code for disabled code style rules (see phpmd.xml and phpcs.xml)
- [ ] Show an example of renewing the session lifetime
- [ ] Feature to enable/disable exceptions?
- [ ] Feature to add prefixes in session attributes?

## Changelog

Detailed changes for each release are documented in the
[release notes](https://github.com/josantonius/php-session/releases).

## Contribution

Please make sure to read the [Contributing Guide](.github/CONTRIBUTING.md), before making a pull
request, start a discussion or report a issue.

Thanks to all [contributors](https://github.com/josantonius/php-session/graphs/contributors)! :heart:

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [MIT License](LICENSE).

Copyright © 2017-present, [Josantonius](https://github.com/josantonius#contact)
