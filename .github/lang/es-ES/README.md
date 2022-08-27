# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/session/v/stable)](https://packagist.org/packages/josantonius/session)
[![License](https://poser.pugx.org/josantonius/session/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/session/downloads)](https://packagist.org/packages/josantonius/session)
[![CI](https://github.com/josantonius/php-session/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-session/actions/workflows/ci.yml)
[![CodeCov](https://codecov.io/gh/josantonius/php-session/main/master/graph/badge.svg)](https://codecov.io/gh/josantonius/php-session)
[![PSR1](https://img.shields.io/badge/PSR-1-f57046.svg)](https://www.php-fig.org/psr/psr-1/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](https://www.php-fig.org/psr/psr-4/)
[![PSR12](https://img.shields.io/badge/PSR-12-1abc9c.svg)](https://www.php-fig.org/psr/psr-12/)

**Traducciones**: [English](/README.md)

Biblioteca PHP para manejo de sesiones.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Clases disponibles](#clases-disponibles)
  - [Clase Session](#clase-session)
  - [Fachada Session](#fachada-session)
- [Excepciones utilizadas](#excepciones-utilizadas)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#tareas-pendientes)
- [Registro de Cambios](#registro-de-cambios)
- [Contribuir](#contribuir)
- [Patrocinar](#patrocinar)
- [Licencia](#licencia)

---

## Requisitos

Esta biblioteca es compatible con las versiones de PHP: 8.0 | 8.1.

## Instalación

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Session library**, simplemente escribe:

```console
composer require josantonius/session
```

El comando anterior sólo instalará los archivos necesarios,
si prefieres **descargar todo el código fuente** puedes utilizar:

```console
composer require josantonius/session --prefer-source
```

También puedes **clonar el repositorio** completo con Git:

```console
git clone https://github.com/josantonius/php-session.git
```

## Clases disponibles

### Clase Session

`Josantonius\Session\Session`

Iniciar la sesión:

```php
/**
 * @throws HeadersSentException        si los _headers_ ya se enviaron.
 * @throws SessionStartedException     si la sesión ya está iniciada.
 * @throws WrongSessionOptionException si hay algún fallo con las opciones.
 * 
 * @see https://php.net/session.configuration para ver la lista de opciones disponibles.
 */
public function start(array $options = []): bool;
```

Comprobar si la sesión fue iniciada:

```php
public function isStarted(): bool;
```

Establecer un atributo por su nombre:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public function set(string $name, mixed $value): void;
```

Obtener un atributo por su nombre:

```php
/**
 * Opcionalmente define un valor por defecto cuando el atributo no existe.
 */
public function get(string $name, mixed $default = null): mixed;
```

Obtener todos los atributos:

```php
public function all(): array;
```

Comprobar si un atributo existe en la sesión:

```php
public function has(string $name): bool;
```

Establecer múltiples atributos de una vez:

```php
/**
 * Si los atributos existen se sustituyen, si no existen se crean.
 * 
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public function replace(array $data): void;
```

Eliminar un atributo por su nombre y devolver su valor:

```php
/**
 * Opcionalmente define un valor por defecto cuando el atributo no existe.
 * 
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public function pull(string $name, mixed $default = null): mixed;
```

Eliminar un atributo por su nombre:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public function remove(string $name): void;
```

Liberar todas las variables de la sesión:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public function clear(): void;
```

Obtiene el ID de la sesión:

```php
public function getId(): string;
```

Establecer el ID de la sesión:

```php
/**
 * @throws SessionStartedException si la sesión ya está iniciada.
 */
public function setId(string $sessionId): void;
```

Actualizar el ID de la sesión actual con uno recién generado:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public function regenerateId(bool $deleteOldSession = false): bool;
```

Obtener el nombre de la sesión:

```php
public function getName(): string;
```

Establecer el nombre de la sesión:

```php
/**
 * @throws SessionStartedException si la sesión ya está iniciada.
 */
public function setName(string $name): void;
```

Eliminar la sesión:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public function destroy(): bool;
```

### Fachada Session

`Josantonius\Session\Facades\Session`

Iniciar la sesión:

```php
/**
 * @throws HeadersSentException        si los _headers_ ya se enviaron.
 * @throws SessionStartedException     si la sesión ya está iniciada.
 * @throws WrongSessionOptionException si hay algún fallo con las opciones.
 * 
 * @see https://php.net/session.configuration para ver la lista de opciones disponibles.
 */
public static function start(array $options = []): bool;
```

Comprobar si la sesión fue iniciada:

```php
public static function isStarted(): bool;
```

Establecer un atributo por su nombre:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public static function set(string $name, mixed $value): void;
```

Obtener un atributo por su nombre:

```php
/**
 * Opcionalmente define un valor por defecto cuando el atributo no existe.
 */
public static function get(string $name, mixed $default = null): mixed;
```

Obtener todos los atributos:

```php
public static function all(): array;
```

Comprobar si un atributo existe en la sesión:

```php
public static function has(string $name): bool;
```

Establecer múltiples atributos de una vez:

```php
/**
 * Si los atributos existen se sustituyen, si no existen se crean.
 * 
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public static function replace(array $data): void;
```

Eliminar un atributo por su nombre y devolver su valor:

```php
/**
 * Opcionalmente define un valor por defecto cuando el atributo no existe.
 * 
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public static function pull(string $name, mixed $default = null): mixed;
```

Eliminar un atributo por su nombre:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public static function remove(string $name): void;
```

Liberar todas las variables de la sesión:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public static function clear(): void;
```

Obtiene el ID de la sesión:

```php
public static function getId(): string;
```

Establecer el ID de la sesión:

```php
/**
 * @throws SessionStartedException si la sesión ya está iniciada.
 */
public static function setId(string $sessionId): void;
```

Actualizar el ID de la sesión actual con uno recién generado:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public static function regenerateId(bool $deleteOldSession = false): bool;
```

Obtener el nombre de la sesión:

```php
public static function getName(): string;
```

Establecer el nombre de la sesión:

```php
/**
 * @throws SessionStartedException si la sesión ya está iniciada.
 */
public static function setName(string $name): void;
```

Eliminar la sesión:

```php
/**
 * @throws SessionNotStartedException si la sesión no está iniciada.
 */
public static function destroy(): bool;
```

## Excepciones utilizadas

```php
use Josantonius\Session\Exceptions\HeadersSentException;
use Josantonius\Session\Exceptions\SessionException;
use Josantonius\Session\Exceptions\SessionNotStartedException;
use Josantonius\Session\Exceptions\SessionStartedException;
use Josantonius\Session\Exceptions\WrongSessionOptionException;
```

## Uso

Ejemplos de uso para esta biblioteca:

### Iniciar la sesión sin establecer opciones

```php
use Josantonius\Session\Session;

$session = new Session();

$session->start();
```

```php
use Josantonius\Session\Facades\Session;

Session::start();
```

### Iniciar la sesión estableciendo opciones

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

### Comprobar si la sesión fue iniciada

```php
use Josantonius\Session\Session;

$session = new Session();

$session->isStarted();
```

```php
use Josantonius\Session\Facades\Session;

Session::isStarted();
```

### Establecer un atributo por su nombre

```php
use Josantonius\Session\Session;

$session = new Session();

$session->set('foo', 'bar');
```

```php
use Josantonius\Session\Facades\Session;

Session::set('foo', 'bar');
```

### Obtener un atributo por su nombre sin establecer valor por defecto

```php
use Josantonius\Session\Session;

$session = new Session();

$session->get('foo'); // null si el atributo no existe
```

```php
use Josantonius\Session\Facades\Session;

Session::get('foo'); // null si el atributo no existe
```

### Obtener un atributo por su nombre estableciendo valor por defecto

```php
use Josantonius\Session\Session;

$session = new Session();

$session->get('foo', false); // false si el atributo no existe
```

```php
use Josantonius\Session\Facades\Session;

Session::get('foo', false); // false si el atributo no existe
```

### Obtener todos los atributos

```php
use Josantonius\Session\Session;

$session = new Session();

$session->all();
```

```php
use Josantonius\Session\Facades\Session;

Session::all();
```

### Comprobar si un atributo existe en la sesión

```php
use Josantonius\Session\Session;

$session = new Session();

$session->has('foo');
```

```php
use Josantonius\Session\Facades\Session;

Session::has('foo');
```

### Establecer múltiples atributos de una vez

```php
use Josantonius\Session\Session;

$session = new Session();

$session->replace(['foo' => 'bar', 'bar' => 'foo']);
```

```php
use Josantonius\Session\Facades\Session;

Session::replace(['foo' => 'bar', 'bar' => 'foo']);
```

### Elimina un atributo y devuelve su valor o el valor por defecto si no existe

```php
use Josantonius\Session\Session;

$session = new Session();

$session->pull('foo'); // null si el atributo no existe
```

```php
use Josantonius\Session\Facades\Session;

Session::pull('foo'); // null si el atributo no existe
```

### Elimina un atributo y devuelve su valor o el valor personalizado si no existe

```php
use Josantonius\Session\Session;

$session = new Session();

$session->pull('foo', false); // false si el atributo no existe
```

```php
use Josantonius\Session\Facades\Session;

Session::pull('foo', false); // false si el atributo no existe
```

### Eliminar un atributo por su nombre

```php
use Josantonius\Session\Session;

$session = new Session();

$session->remove('foo');
```

```php
use Josantonius\Session\Facades\Session;

Session::remove('foo');
```

### Liberar todas las variables de la sesión

```php
use Josantonius\Session\Session;

$session = new Session();

$session->clear();
```

```php
use Josantonius\Session\Facades\Session;

Session::clear();
```

### Obtiene el ID de la sesión

```php
use Josantonius\Session\Session;

$session = new Session();

$session->getId();
```

```php
use Josantonius\Session\Facades\Session;

Session::getId();
```

### Establecer el ID de la sesión

```php
use Josantonius\Session\Session;

$session = new Session();

$session->setId('foo');
```

```php
use Josantonius\Session\Facades\Session;

Session::setId('foo');
```

### Actualizar el ID de la sesión actual con uno recién generado

```php
use Josantonius\Session\Session;

$session = new Session();

$session->regenerateId();
```

```php
use Josantonius\Session\Facades\Session;

Session::regenerateId();
```

### Actualizar el ID de la sesión actual por otro y eliminar la sesión anterior

```php
use Josantonius\Session\Session;

$session = new Session();

$session->regenerateId(true);
```

```php
use Josantonius\Session\Facades\Session;

Session::regenerateId(true);
```

### Obtener el nombre de la sesión

```php
use Josantonius\Session\Session;

$session = new Session();

$session->getName();
```

```php
use Josantonius\Session\Facades\Session;

Session::getName();
```

### Establecer el nombre de la sesión

```php
use Josantonius\Session\Session;

$session = new Session();

$session->setName('foo');
```

```php
use Josantonius\Session\Facades\Session;

Session::setName('foo');
```

### Eliminar la sesión

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

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/)
y seguir los siguientes pasos:

```console
git clone https://github.com/josantonius/php-session.git
```

```console
cd php-session
```

```console
composer install
```

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

```console
composer phpunit
```

Ejecutar pruebas de estándares de código con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

```console
composer phpcs
```

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/)
para detectar inconsistencias en el estilo de codificación:

```console
composer phpmd
```

Ejecutar todas las pruebas anteriores:

```console
composer tests
```

## Tareas pendientes

- [ ] Añadir nueva funcionalidad
- [ ] Mejorar pruebas
- [ ] Mejorar documentación
- [ ] Mejorar la traducción al inglés en el archivo README
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas
(ver [phpmd.xml](phpmd.xml) y [phpcs.xml](phpcs.xml))
- [ ] Mostrar un ejemplo de renovación de la duración de la sesión
- [ ] ¿Funcionalidad para activar/desactivar excepciones?
- [ ] ¿Funcionalidad para añadir prefijos en los atributos de sesión?

## Registro de Cambios

Los cambios detallados de cada versión se documentan en las
[notas de la misma](https://github.com/josantonius/php-session/releases).

## Contribuir

Por favor, asegúrate de leer la [Guía de contribución](CONTRIBUTING.md) antes de hacer un
_pull request_, comenzar una discusión o reportar un _issue_.

¡Gracias por [colaborar](https://github.com/josantonius/php-session/graphs/contributors)! :heart:

## Patrocinar

Si este proyecto te ayuda a reducir el tiempo de desarrollo,
[puedes patrocinarme](https://github.com/josantonius/lang/es-ES/README.md#patrocinar)
para apoyar mi trabajo :blush:

## Licencia

Este repositorio tiene una licencia [MIT License](LICENSE).

Copyright © 2017-actualidad, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
