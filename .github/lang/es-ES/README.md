# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/session/v/stable)](https://packagist.org/packages/josantonius/session)
[![License](https://poser.pugx.org/josantonius/session/license)](LICENSE)
[![Total Downloads](https://poser.pugx.org/josantonius/session/downloads)](https://packagist.org/packages/josantonius/session)
[![CI](https://github.com/josantonius/php-session/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/josantonius/php-session/actions/workflows/ci.yml)
[![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/)
[![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/)
[![CodeCov](https://codecov.io/gh/josantonius/php-session/branch/master/graph/badge.svg)](https://codecov.io/gh/josantonius/php-session)

**Traducciones**: [English](/README.md)

Biblioteca PHP para manejo de sesiones.

> La versión 1.x se considera obsoleta y sin soporte.
> En la próxima versión (2.x) la biblioteca será completamente reestructurada y sólo será
> compatible con PHP 8 o versiones superiores.
> Se recomienda revisar la documentación de la próxima versión y hacer los cambios necesarios
> antes de empezar a utilizarla, ya que no será compatible con la versión 1.x.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Registro de Cambios](#registro-de-cambios)
- [Contribuir](#contribuir)
- [Patrocinar](#patrocinar)
- [Licencia](#licencia)

---

## Requisitos

Esta biblioteca es compatible con las versiones de PHP: 5.6 | 7.0 | 7.1 | 7.2 | 7.3 | 7.4.

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

O **instalarlo manualmente**:

[Descargar Session.php](https://raw.githubusercontent.com/Josantonius/PHP-Session/master/src/Session.php):

```console
wget https://raw.githubusercontent.com/josantonius/php-session/master/src/Session.php
```

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### Establecer prefijo para sesiones

```php
Session::setPrefix($prefix);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $prefix | Prefijo para las sesiones. | object | Sí | |

**# Return** (boolean)

### Obtener prefijo de las sesiones

```php
Session::getPrefix();
```

**# Return** (string) → prefijo de las sesiones

### Iniciar sesión si la sesión no se ha iniciado

```php
Session::init($lifeTime);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $lifeTime | Duración de la sesión. | int | No | 0 |

**# Return** (boolean)

### Añadir valor a una sesión

```php
Session::set($key, $value);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Nombre de la sesión. | string | Sí | |
| $value | Datos a guardar. | mixed | No | false |

**# Return** (boolean true)

### Extraer valor y borrar sesión

```php
Session::pull($key);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Nombre de la sesión a extraer. | string | Sí | |

**# Return** (mixed|null) → valor de la sesión o null si no existe

### Obtener el valor de la sesión

```php
Session::get($key, $secondkey);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Nombre de la sesión. | string | No | '' |
| $secondkey | Segunda clave de la sesión. | string|boolean | No | false |

**# Return** (mixed|null) → valor de la sesión o null si no existe

### Obtener ID de la sesión

```php
Session::id();
```

**# Return** (string) → sesión ID o vacío

### Regenerar session_id

```php
Session::regenerate();
```

**# Return** (string) → el nuevo ID de la sessión

### Vaciar y destruir sesiones

```php
Session::destroy($key, $prefix);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | ID de la sesión a destruir. | string | No | '' |
| $prefix | Si se establece en true, se eliminarán todas las sesiones con el prefijo indicado. | boolean | No | false |

**# Return** (boolean)

## Cómo empezar

Para utilizar esta biblioteca con **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Session\Session;
```

Si la instalaste **manualmente**, utiliza:

```php
require_once __DIR__ . '/Session.php';

use Josantonius\Session\Session;
```

## Uso

Ejemplo de uso para esta biblioteca:

### - Establecer prefijo para sesiones

```php
Session::setPrefix('_prefix');
```

### - Obtener prefijo de las sesiones

```php
Session::getPrefix();
```

### - Iniciar sesión

```php
Session::init();
```

### - Iniciar sesión estableciendo el tiempo de duración de la sesión

```php
Session::init(3600);
```

### - Añadir valor a una sesión

```php
Session::set('name', 'Joseph');
```

### - Agregar valor múltiple a las sesiones

```php
$data = [
    'name'     => 'Joseph',
    'age'      => '28',
    'business' => ['name' => 'Company'],
];

Session::set($data);
```

### - Extraer y borrar sesión

```php
Session::pull('age');
```

### - Obtener el valor de la sesión

```php
Session::get('name');
```

### - Obtener el valor de la sesión introduciendo dos índices

```php
Session::get('business', 'name');
```

### - Obtener todos los elementos de la sesión

```php
Session::get();
```

### - Obtener ID de la sesión

```php
Session::id();
```

### - Regenerar session_id

```php
Session::regenerate();
```

### - Destruir un elemento de la sesión

```php
Session::destroy('name');
```

### - Destruir todas las sesiones con determinado prefijo

```php
Session::destroy('ses_', true);
```

### - Destruir todas las sesiones

```php
Session::destroy();
```

## Tests

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

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

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

```console
composer phpcs
```

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

```console
composer phpmd
```

Ejecutar todas las pruebas anteriores:

```console
composer tests
```

## ☑ Tareas pendientes

- [ ] Añadir nueva funcionalidad.
- [ ] Mejorar pruebas.
- [ ] Mejorar documentación.
- [ ] Mejorar la traducción al inglés en el archivo README.
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas.
Ver [phpmd.xml](phpmd.xml) y [phpcs.xml](phpcs.xml).

## Registro de Cambios

Los cambios detallados de cada versión se documentan en las
[notas de la misma](https://github.com/josantonius/php-session/releases).

## Contribuir

Por favor, asegúrate de leer la [Guía de contribución](CONTRIBUTING.md) antes de hacer un
_pull request_, comenzar una discusión o reportar un _issue_.

¡Gracias por [colaborar](https://github.com/josantonius/php-json/graphs/contributors)! :heart:

## Patrocinar

Si este proyecto te ayuda a reducir el tiempo de desarrollo,
[puedes patrocinarme](https://github.com/josantonius/lang/es-ES/README.md#patrocinar)
para apoyar mi trabajo :blush:

## Licencia

Este repositorio tiene una licencia [MIT License](LICENSE).

Copyright © 2017-actualidad, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
