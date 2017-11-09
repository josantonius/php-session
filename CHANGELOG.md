# CHANGELOG

## 1.1.5 - 2017-11-09

* Implemented `PHP Mess Detector` to detect inconsistencies in code styles.

* Implemented `PHP Code Beautifier and Fixer` to fixing errors automatically.

* Implemented `PHP Coding Standards Fixer` to organize PHP code automatically according to PSR standards.

## 1.1.4 - 2017-10-27

* Implemented `PSR-4 autoloader standard` from all library files.

* Implemented `PSR-2 coding standard` from all library PHP files.

* Implemented `PHPCS` to ensure that PHP code complies with `PSR2` code standards.

* Implemented `Codacy` to automates code reviews and monitors code quality over time.

* Implemented `Codecov` to coverage reports.

* Added `Session/phpcs.ruleset.xml` file.

* Deleted `Session/src/bootstrap.php` file.

* Deleted `Session/tests/bootstrap.php` file.

* Deleted `Session/vendor` folder.

* Changed `Josantonius\Session\Test\SessionTest` class to  `Josantonius\Session\SessionTest` class.

## 1.1.3 - 2017-09-17

* Unit tests supported by `PHPUnit` were added.

* The repository was synchronized with `Travis CI` to implement continuous integration.
 
* Added `Session/src/bootstrap.php` file

* Added `Session/tests/bootstrap.php` file.

* Added `Session/phpunit.xml.dist` file.
* Added `Session/_config.yml` file.
* Added `Session/.travis.yml` file.

* Deleted `Josantonius\Session\Session::display()` method.

* Deleted `Josantonius\Session\Tests\SessionTest` class.
* Deleted `Josantonius\Session\Tests\SessionTest::testSetPrefix()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testSet()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testSetMultiple()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testPull()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testGet()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testGetSecondKey()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testId()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testRegenerate()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testDisplay()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testDestroyOneKeySession()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testDestroyAllSessions()` method.
* Deleted `Josantonius\Session\Tests\SessionTest::testDestroyAllSessions()` method.

* Added `Josantonius\Session\Test\SessionTest` class.
* Added `Josantonius\Session\Test\SessionTest::testSetPrefix()` method.
* Added `Josantonius\Session\Test\SessionTest::testInit()` method.
* Added `Josantonius\Session\Test\SessionTest::testSet()` method.
* Added `Josantonius\Session\Test\SessionTest::testSetMultiple()` method.
* Added `Josantonius\Session\Test\SessionTest::testPull()` method.
* Added `Josantonius\Session\Test\SessionTest::testPullNonExistent()` method.
* Added `Josantonius\Session\Test\SessionTest::testGet()` method.
* Added `Josantonius\Session\Test\SessionTest::testGetNonExistent()` method.
* Added `Josantonius\Session\Test\SessionTest::testGetWithSecondKey()` method.
* Added `Josantonius\Session\Test\SessionTest::testGetWithSecondKeyNonExistent()` method.
* Added `Josantonius\Session\Test\SessionTest::testGetAll()` method.
* Added `Josantonius\Session\Test\SessionTest::testId()` method.
* Added `Josantonius\Session\Test\SessionTest::testRegenerate()` method.
* Added `Josantonius\Session\Test\SessionTest::testValidateRegenerateId()` method.
* Added `Josantonius\Session\Test\SessionTest::testDestroy()` method.

## 1.1.2 - 2017-07-16
* Added `Josantonius\Session\Exception\SessionException` class.
* Added `Josantonius\Session\Exception\Exceptions` abstract class.
* Added `Josantonius\Session\Exception\SessionException->__construct()` method.

## 1.1.1 - 2017-03-18
* Some files were excluded from download and comments and readme files were updated.

## 1.1.0 - 2017-01-30
* Compatible with PHP 5.6 or higher.

## 1.0.0 - 2017-01-30
* Compatible only with PHP 7.0 or higher. In the next versions, the library will be modified to make it compatible with PHP 5.6 or higher.

## 1.0.0 - 2017-01-17
* Added `Josantonius\Session\Session` class.
* Added `Josantonius\Session\Session::init()` method.
* Added `Josantonius\Session\Session::setPrefix()` method.
* Added `Josantonius\Session\Session::set()` method.
* Added `Josantonius\Session\Session::pull()` method.
* Added `Josantonius\Session\Session::get()` method.
* Added `Josantonius\Session\Session::id()` method.
* Added `Josantonius\Session\Session::regenerate()` method.
* Added `Josantonius\Session\Session::display()` method.
* Added `Josantonius\Session\Session::destroy()` method.

## 1.0.0 - 2017-01-17
* Added `Josantonius\Session\Exception\SessionException` class.
* Added `Josantonius\Session\Exception\Exceptions` abstract class.
* Added `Josantonius\Session\Exception\SessionException->__construct()` method.

## 1.0.0 - 2017-01-17
* Added `Josantonius\Session\Tests\SessionTest` class.
* Added `Josantonius\Session\Tests\SessionTest::testSetPrefix()` method.
* Added `Josantonius\Session\Tests\SessionTest::testSet()` method.
* Added `Josantonius\Session\Tests\SessionTest::testSetMultiple()` method.
* Added `Josantonius\Session\Tests\SessionTest::testPull()` method.
* Added `Josantonius\Session\Tests\SessionTest::testGet()` method.
* Added `Josantonius\Session\Tests\SessionTest::testGetSecondKey()` method.
* Added `Josantonius\Session\Tests\SessionTest::testId()` method.
* Added `Josantonius\Session\Tests\SessionTest::testRegenerate()` method.
* Added `Josantonius\Session\Tests\SessionTest::testDisplay()` method.
* Added `Josantonius\Session\Tests\SessionTest::testDestroyOneKeySession()` method.
* Added `Josantonius\Session\Tests\SessionTest::testDestroyAllSessions()` method.
* Added `Josantonius\Session\Tests\SessionTest::testDestroyAllSessions()` method.