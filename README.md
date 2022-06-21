# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/session/v/stable)](https://packagist.org/packages/josantonius/session)
[![License](https://poser.pugx.org/josantonius/session/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/session/downloads)](https://packagist.org/packages/josantonius/session)
[![CI](https://github.com/josantonius/php-session/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-session/actions/workflows/ci.yml)
[![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/)
[![CodeCov](https://codecov.io/gh/josantonius/php-session/branch/master/graph/badge.svg)](https://codecov.io/gh/josantonius/php-session)

**Translations**: [Español](.github/lang/es-ES/README.md)

PHP library for handling sessions.

> Version 1.x is considered as deprecated and unsupported.
> In the next version (2.x) the library will be completely restructured and will only be
> compatible with PHP 8 or higher versions.
> It is recommended to review the documentation for the next version and make the necessary changes
> before starting to use it, as it will not be compatible with version 1.x.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Changelog](#changelog)
- [Contribution](#contribution)
- [Sponsor](#Sponsor)
- [License](#license)

---

## Requirements

This library is compatible with the PHP versions: 5.6 | 7.0 | 7.1 | 7.2 | 7.3 | 7.4.

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

Or **install it manually**:

[Download Session.php](https://raw.githubusercontent.com/josantonius/php-session/master/src/Session.php):

```console
wget https://raw.githubusercontent.com/josantonius/php-session/master/src/Session.php
```

## Available Methods

Available methods in this library:

### Set prefix for sessions

```php
Session::setPrefix($prefix);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $prefix | Prefix for sessions. | object | Yes | |

**# Return** (boolean)

### Get sessions prefix

```php
Session::getPrefix();
```

**# Return** (string) → sessions prefix

### Start session if session has not started

```php
Session::init($lifeTime);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $lifeTime | Life time during session. | int | No | 0 |

**# Return** (boolean)

### Add value to a session

```php
Session::set($key, $value);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Session name. | string | Yes | |
| $value | The data to save. | mixed | No | false |

**# Return** (boolean true)

### Extract session item, delete session item and finally return the item

```php
Session::pull($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Item to extract. | string | Yes | |

**# Return** (mixed|null) → return item or null when key does not exists

### Get item from session

```php
Session::get($key, $secondkey);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Item to look for in session. | string | No | '' |
| $secondkey | If used then use as a second key. | string|boolean | No | false |

**# Return** (mixed|null) → return item or null when key does not exists

### Get session id

```php
Session::id();
```

**# Return** (string) → the session id or empty

### Regenerate session_id

```php
Session::regenerate();
```

**# Return** (string) → the new session id

### Empties and destroys the session

```php
Session::destroy($key, $prefix);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Session ID to destroy. | string | No | '' |
| $prefix | If true clear all sessions for current prefix. | boolean | No | false |

**# Return** (boolean)

## Quick Start

To use this library with **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use josantonius\Session\Session;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/Session.php';

use josantonius\Session\Session;
```

## Usage

Example of use for this library:

### - Set prefix for sessions

```php
Session::setPrefix('_prefix');
```

### - Get sessions prefix

```php
Session::getPrefix();
```

### - Start session

```php
Session::init();
```

### - Start session by setting the session duration

```php
Session::init(3600);
```

### - Add value to a session

```php
Session::set('name', 'Joseph');
```

### - Add multiple value to sessions

```php
$data = [
    'name'     => 'Joseph',
    'age'      => '28',
    'business' => ['name' => 'Company'],
];

Session::set($data);
```

### - Extract session item, delete session item and finally return the item

```php
Session::pull('age');
```

### - Get item from session

```php
Session::get('name');
```

### - Get item from session entering two indexes

```php
Session::get('business', 'name');
```

### - Return the session array

```php
Session::get();
```

### - Get session id

```php
Session::id();
```

### - Regenerate session_id

```php
Session::regenerate();
```

### - Destroys one key session

```php
Session::destroy('name');
```

### - Destroys sessions by prefix

```php
Session::destroy('ses_', true);
```

### - Destroys all sessions

```php
Session::destroy();
```

## Tests

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

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

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

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

## ☑ TODO

- [ ] Add new feature.
- [ ] Improve tests.
- [ ] Improve documentation.
- [ ] Improve English translation in the README file.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [phpcs.xml](phpcs.xml).

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
