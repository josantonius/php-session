# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Session/v/stable)](https://packagist.org/packages/josantonius/Session) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Session/v/unstable)](https://packagist.org/packages/josantonius/Session) [![License](https://poser.pugx.org/josantonius/Session/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/37b8ff548b4841509d29e7079c8c7ee5)](https://www.codacy.com/app/Josantonius/PHP-Session?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Session&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Session/downloads)](https://packagist.org/packages/josantonius/Session) [![Travis](https://travis-ci.org/Josantonius/PHP-Session.svg)](https://travis-ci.org/Josantonius/PHP-Session) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Session/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Session)

[Versión en español](README-ES.md)

PHP library for handling sessions.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Session library**, simply:

    $ composer require Josantonius/Session

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require Josantonius/Session --prefer-source

You can also **clone the complete repository** with Git:

  $ git clone https://github.com/Josantonius/PHP-Session.git

Or **install it manually**:

[Download Session.php](https://raw.githubusercontent.com/Josantonius/PHP-Session/master/src/Session.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Session/master/src/Session.php

## Available Methods

Available methods in this library:

### - Set prefix for sessions:

```php
Session::setPrefix($prefix);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $prefix | Prefix for sessions. | object | Yes | |

**# Return** (boolean)

### - Get sessions prefix:

```php
Session::getPrefix();
```

**# Return** (string) → sessions prefix

### - Start session if session has not started:

```php
Session::init($lifeTime);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $lifeTime | Life time during session. | int | No | 0 |

**# Return** (boolean)

### - Add value to a session:

```php
Session::set($key, $value);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Session name. | string | Yes | |
| $value | The data to save. | mixed | No | false |

**# Return** (boolean true)

### - Extract session item, delete session item and finally return the item:

```php
Session::pull($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Item to extract. | string | Yes | |

**# Return** (mixed|null) → return item or null when key does not exists

### - Get item from session:

```php
Session::get($key, $secondkey);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Item to look for in session. | string | No | '' |
| $secondkey | If used then use as a second key. | string|boolean | No | false |

**# Return** (mixed|null) → return item or null when key does not exists

### - Get session id:

```php
Session::id();
```

**# Return** (string) → the session id or empty

### - Regenerate session_id:

```php
Session::regenerate();
```

**# Return** (string) → the new session id

### - Empties and destroys the session:

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

use Josantonius\Session\Session;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/Session.php';

use Josantonius\Session\Session;
```

## Usage

Example of use for this library:

### - Set prefix for sessions:

```php
Session::set('name', 'Joseph');
```

### - Get sessions prefix:

```php
Session::getPrefix();
```

### - Start session:

```php
Session::init();
```

### - Add value to a session:

```php
Session::init();
```

### - Add multiple value to sessions:

```php
$data = [
    'name'     => 'Joseph',
    'age'      => '28',
    'business' => ['name' => 'Company'],
];

Session::set($data);
```

### - Extract session item, delete session item and finally return the item:

```php
Session::pull('age');
```

### - Get item from session:

```php
Session::get('name');
```

### - Get item from session entering two indexes:

```php
Session::get('business', 'name');
```

### - Return the session array:

```php
Session::get();
```

### - Get session id:

```php
Session::id();
```

### - Regenerate session_id:

```php
Session::regenerate();
```

### - Destroys one key session:

```php
Session::destroy('name');
```

### - Destroys sessions by prefix:

```php
Session::destroy('ses_', true);
```

### - Destroys all sessions:

```php
Session::destroy();
```

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/Josantonius/PHP-Session.git
    
    $ cd PHP-Session

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add new feature.
- [ ] Improve tests.
- [ ] Improve documentation.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [.php_cs.dist](.php_cs.dist).
- [ ] Add tests for session duration in the init() method.

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/Josantonius/PHP-Session/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

**Thank you to all the people who already contributed to this project!**

[<img alt="peter279k" src="https://avatars2.githubusercontent.com/u/9021747?v=4&s=117" height="117" width="117">](https://github.com/peter279k) |
:---:|
[peter279k](https://github.com/peter279k)|

[<img alt="chrisrowley14" src="https://avatars1.githubusercontent.com/u/12914881?s=117&v=4" height="117" width="117">](https://github.com/chrisrowley14) |
:---:|
[chrisrowley14](https://github.com/chrisrowley14)|

## Repository

The file structure from this repository was created with [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).