# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/session/v/stable)](https://packagist.org/packages/josantonius/session)
[![License](https://poser.pugx.org/josantonius/session/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/session/downloads)](https://packagist.org/packages/josantonius/session)
[![CI](https://github.com/josantonius/php-session/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-session/actions/workflows/ci.yml)
[![CodeCov](https://codecov.io/gh/josantonius/php-session/branch/main/graph/badge.svg)](https://codecov.io/gh/josantonius/php-session)
[![PSR1](https://img.shields.io/badge/PSR-1-f57046.svg)](https://www.php-fig.org/psr/psr-1/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR12](https://img.shields.io/badge/PSR-12-1abc9c.svg)](https://www.php-fig.org/psr/psr-12/)

**Translations**: [Español](.github/lang/es-ES/README.md)

PHP library for handling sessions.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Classes](#available-classes)
  - [Session Class](#session-class)
  - [Session Facade](#session-facade)
- [Exceptions Used](#exceptions-used)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#todo)
- [Changelog](#changelog)
- [Contribution](#contribution)
- [Sponsor](#sponsor)
- [License](#license)

---

## Requirements

- Operating System: Linux | Windows.

- PHP versions: 8.0 | 8.1 | 8.2 | 8.3.

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

```php
use Josantonius\Session\Session;

$session = new Session();

$session->start([
    // 'cache_expire' => 180,
    // 'cache_limiter' => 'nocache',
    // 'cookie_domain' => '',
    'cookie_httponly' => true,
    'cookie_lifetime' => 8000,
    // 'cookie_path' => '/',
    'cookie_samesite' => 'Strict',
    'cookie_secure'   => true,
    // 'gc_divisor' => 100,
    // 'gc_maxlifetime' => 1440,
    // 'gc_probability' => true,
    // 'lazy_write' => true,
    // 'name' => 'PHPSESSID',
    // 'read_and_close' => false,
    // 'referer_check' => '',
    // 'save_handler' => 'files',
    // 'save_path' => '',
    // 'serialize_handler' => 'php',
    // 'sid_bits_per_character' => 4,
    // 'sid_length' => 32,
    // 'trans_sid_hosts' => $_SERVER['HTTP_HOST'],
    // 'trans_sid_tags' => 'a=href,area=href,frame=src,form=',
    // 'use_cookies' => true,
    // 'use_only_cookies' => true,
    // 'use_strict_mode' => false,
    // 'use_trans_sid' => false,
]);
```

```php
use Josantonius\Session\Facades\Session;

Session::start([
    'cookie_httponly' => true,
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
- [ ] Improve English translation in the README file
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
