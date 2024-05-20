# CHANGELOG

## [v2.0.9](https://github.com/josantonius/php-session/releases/tag/v2.0.9) (2024-05-20)

* Tests for PHP 8.3 have been added. 

## [v2.0.8](https://github.com/josantonius/php-session/releases/tag/v2.0.8) (2022-09-29)

* The notation type in the test function names has been changed from camel to snake case for readability.

* Functions were added to document the methods and avoid confusion.

* Disabled the ´CamelCaseMethodName´ rule in ´phpmd.xml´ to avoid warnings about function names in tests.

* The alignment of the asterisks in the comments has been fixed.

* Tests for Windows have been added.

* Tests for PHP 8.2 have been added.

## [v2.0.7](https://github.com/josantonius/php-session/releases/tag/v2.0.7) (2022-08-11)

* Improved documentation.

## [v2.0.6](https://github.com/josantonius/php-session/releases/tag/v2.0.6) (2022-08-07)

* The error handler was removed as it could override a previously created error handler or be
easily overridden by another error handler.

* Functions were added to perform what was done from the error handler.

* `Josantonius\Session\Exceptions\SessionException` was deprecated and
will be removed in the next version.

* It is recommended to use the new exceptions added to catch exceptions:

  * `Josantonius\Session\Exceptions\HeadersSentException`;
  * `Josantonius\Session\Exceptions\SessionNotStartedException`;
  * `Josantonius\Session\Exceptions\SessionNotStartedException`;
  * `Josantonius\Session\Exceptions\SessionStartedException`;
  * `Josantonius\Session\Exceptions\WrongSessionOptionException`;

* Documents and comments on these changes were updated.

* There have been no major changes from the previous version.

## [v2.0.5](https://github.com/josantonius/php-session/releases/tag/v2.0.5) (2022-07-31)

* Fix documentation on available methods in `README.md`.

* Removed the warning about version 1.x in the `README.md` files.

* Fix exception comment.

* The namespaces in the test classes were sorted.

* Added return value in the test classes.

* Changed the PHPUnit version from `9.0` to `9.5`.

* Fixed blank line at the beginning of the file in `FUNDING.yml`.

## [v2.0.4](https://github.com/josantonius/php-session/releases/tag/v2.0.4) (2022-07-13)

* Changes in documentation.

## [v2.0.3](https://github.com/josantonius/php-session/releases/tag/v2.0.3) (2022-07-13)

* Changes in documentation.

* Deleted `Josantonius\Session\Session->errorHandler()` method.

## [v2.0.2](https://github.com/josantonius/php-session/releases/tag/v2.0.2) (2022-06-30)

* Fix readme namespace. Fixes [#13](https://github.com/josantonius/php-session/issues/13).

* Replace symbol in start method comment.

## [v2.0.1](https://github.com/josantonius/php-session/releases/tag/v2.0.1) (2022-06-28)

* Changes in documentation.

## [2.0.0](https://github.com/josantonius/php-session/releases/tag/2.0.0) (2022-06-27)

> Version 1.x is considered as deprecated and unsupported.
> In this version (2.x) the library was completely restructured.
> It is recommended to review the documentation for this version and make the necessary changes
> before starting to use it, as it not be compatible with version 1.x.

* Replaced all static methods in `Josantonius\Session\Session` class.

  A facade class was added to access the methods statically: `Josantonius\Session\Facades\Session`.

* ADDED:

  `Josantonius\Session\Facades\Session` class.
  
  `Josantonius\Session\Exceptions\SessionException` class.
  
  `Josantonius\Session\Tests\AllMethodTest` class.
  
  `Josantonius\Session\Tests\ClearMethodTest` class.
  
  `Josantonius\Session\Tests\DestroyMethodTest` class.
  
  `Josantonius\Session\Tests\GetIdMethodTest` class.
  
  `Josantonius\Session\Tests\GetMethodTest` class.
  
  `Josantonius\Session\Tests\GetNameMethodTest` class.
  
  `Josantonius\Session\Tests\HasMethodTest` class.
  
  `Josantonius\Session\Tests\IsStartedMethodTest` class.
  
  `Josantonius\Session\Tests\PullMethodTest` class.
  
  `Josantonius\Session\Tests\RegenerateIdMethodTest` class.
  
  `Josantonius\Session\Tests\RemoveMethodTest` class.
  
  `Josantonius\Session\Tests\ReplaceMethodTest` class.
  
  `Josantonius\Session\Tests\SetIdMethodTest` class.
  
  `Josantonius\Session\Tests\SetMethodTest` class.
  
  `Josantonius\Session\Tests\SetNameMethodTest` class.
  
  `Josantonius\Session\Tests\StartMethodTest` class.

* DELETED:
  
  `Josantonius\Session\Tests\SessionTest` class.

## [1.1.9](https://github.com/josantonius/php-session/releases/tag/1.1.9) (2022-06-21)

### IMPORTANT

* Version 1.x is considered as deprecated and unsupported.

* In the next version (2.x) the library will be completely restructured and will only be
compatible with PHP 8 or higher versions.

* It is recommended to review the documentation for the next version and make the necessary changes
before starting to use it, as it will not be compatible with version 1.x.

---

* Improved documentation; `README.md`, `CODE_OF_CONDUCT.md`, `CONTRIBUTING.md` and `CHANGELOG.md`.

* Removed `Codacy`.

* Removed `PHP Coding Standards Fixer`.

* The `master` branch was renamed to `main`.

* The `develop` branch was added to use a workflow based on `Git Flow`.

* `Travis` is discontinued for continuous integration. `GitHub Actions` will be used from now on.

* Added `.github/CODE_OF_CONDUCT.md` file.
* Added `.github/CONTRIBUTING.md` file.
* Added `.github/FUNDING.yml` file.
* Added `.github/workflows/ci.yml` file.
* Added `.github/lang/es-ES/CODE_OF_CONDUCT.md` file.
* Added `.github/lang/es-ES/CONTRIBUTING.md` file.
* Added `.github/lang/es-ES/LICENSE` file.
* Added `.github/lang/es-ES/README` file.

* Deleted `.travis.yml` file.
* Deleted `.editorconfig` file.
* Deleted `CONDUCT.MD` file.
* Deleted `README-ES.MD` file.
* Deleted `.php_cs.dist` file.

## [1.1.8](https://github.com/josantonius/php-session/releases/tag/1.1.8) (2018-05-04)

* @chrisrowley14 added ability to set a lifeTime during session init and added tests.

## [1.1.7](https://github.com/josantonius/php-session/releases/tag/1.1.7) (2018-01-07)

* The tests were fixed.

* Changes in documentation.

## [1.1.6](https://github.com/josantonius/php-session/releases/tag/1.1.6) (2017-11-12)

* Set the correct `phpcbf` fix command in `composer.json`.

* Logical condition was unified.

* Set static methods should in tests class. Use `::` instead of `->`.

* Added `Josantonius\Session\Session::getPrefix()` method.

* Added `Josantonius\Session\Tests\SessionTest::testSetPrefix()` method.

## [1.1.5](https://github.com/josantonius/php-session/releases/tag/1.1.5) (2017-11-09)

* Implemented `PHP Mess Detector` to detect inconsistencies in code styles.

* Implemented `PHP Code Beautifier and Fixer` to fixing errors automatically.

* Implemented `PHP Coding Standards Fixer` to organize PHP code automatically according to PSR standards.

## [1.1.4](https://github.com/josantonius/php-session/releases/tag/1.1.4) (2017-10-27)

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

## [1.1.3](https://github.com/josantonius/php-session/releases/tag/1.1.3) (2017-09-17)

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

## [1.1.2](https://github.com/josantonius/php-session/releases/tag/1.1.2) (2017-07-16)

* Added `Josantonius\Session\Exception\SessionException` class.
* Added `Josantonius\Session\Exception\Exceptions` abstract class.
* Added `Josantonius\Session\Exception\SessionException->__construct()` method.

## [1.1.1](https://github.com/josantonius/php-session/releases/tag/1.1.1) (2017-03-18)

* Some files were excluded from download and comments and readme files were updated.

## [1.1.0](https://github.com/josantonius/php-session/releases/tag/1.1.0) (2017-01-30)

* Compatible with PHP 5.6 or higher.

## [1.0.0](https://github.com/josantonius/php-session/releases/tag/1.0.0) (2017-01-30)

* Compatible only with PHP 7.0 or higher. In the next versions, the library will be modified to make it compatible with PHP 5.6 or higher.

## [1.0.0](https://github.com/josantonius/php-session/releases/tag/1.0.0) (2017-01-17)

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

* Added `Josantonius\Session\Exception\SessionException` class.
* Added `Josantonius\Session\Exception\Exceptions` abstract class.
* Added `Josantonius\Session\Exception\SessionException->__construct()` method.

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
