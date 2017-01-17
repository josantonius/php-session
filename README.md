# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/session/v/stable)](https://packagist.org/packages/josantonius/session) [![Total Downloads](https://poser.pugx.org/josantonius/session/downloads)](https://packagist.org/packages/josantonius/session) [![Latest Unstable Version](https://poser.pugx.org/josantonius/session/v/unstable)](https://packagist.org/packages/josantonius/session) [![License](https://poser.pugx.org/josantonius/session/license)](https://packagist.org/packages/josantonius/session)

[Spanish version](README-ES.md)

PHP library for handling sessions.

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Available Methods](#available-methods)
- [Usage](#usage)
- [Tests](#tests)
- [Exception Handler](#exception-handler)
- [Contribute](#contribute)
- [Repository](#repository)
- [Author](#author)
- [Licensing](#licensing)

---

### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install PHP Session library, simply:

    $ composer require Josantonius/Session

### Requirements

This library is supported by PHP versions 7.0 or higher and is compatible with HHVM versions 3.0 or higher.

To use this library in HHVM (HipHop Virtual Machine) you will have to activate the scalar types. Add the following line "hhvm.php7.scalar_types = true" in your "/etc/hhvm/php.ini".

### Quick Start and Examples

To use this class, simply:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Session\Session;
```
### Available Methods

Available methods in this library:

```php
Session::init();
Session::setPrefix();
Session::set();
Session::pull();
Session::get();
Session::id();
Session::regenerate();
Session::display();
Session::destroy();
```
### Usage

Example of use for this library:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Session\Session;

Session::init();

Session::set('name', 'Joseph');

var_dump(Session::get('name'));
```

### Tests 

To use the [test](tests) class, simply:

```php
<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$loader->addPsr4('Josantonius\\Session\\Tests\\', __DIR__ . '/vendor/josantonius/session/tests');

use Josantonius\Session\Tests\SessionTest;

```
Available test methods in this library:

```php
SessionTest::testSetPrefix();
SessionTest::testSet();
SessionTest::testSetMultiple();
SessionTest::testPull();
SessionTest::testGet();
SessionTest::testGetSecondKey();
SessionTest::testId();
SessionTest::testRegenerate();
SessionTest::testDisplay();
SessionTest::testDestroyOneKeySession();
SessionTest::testDestroyAllSessions();
SessionTest::testDestroyAllSessions();
```

### Exception Handler

This library uses [exception handler](src/Exception) that you can customize.
### Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Repository

All files in this repository were created and uploaded automatically with [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### Author

Maintained by [Josantonius](https://github.com/Josantonius/).

### Licensing

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.