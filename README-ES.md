# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Session/v/stable)](https://packagist.org/packages/josantonius/Session) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Session/v/unstable)](https://packagist.org/packages/josantonius/Session) [![License](https://poser.pugx.org/josantonius/Session/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/d215fe4b6f2040e492d9903294aff387)](https://www.codacy.com/app/Josantonius/PHP-Session?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Session&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Session/downloads)](https://packagist.org/packages/josantonius/Session) [![Travis](https://travis-ci.org/Josantonius/PHP-Session.svg)](https://travis-ci.org/Josantonius/PHP-Session) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Session/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Session)

[English version](README.md)

Biblioteca PHP para manejo de sesiones.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

## Requisitos

Esta clase es soportada por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación 

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Session library**, simplemente escribe:

    $ composer require Josantonius/Session

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require Josantonius/Session --prefer-source

También puedes **clonar el repositorio** completo con Git:

  $ git clone https://github.com/Josantonius/PHP-Session.git

O **instalarlo manualmente**:

[Descargar Session.php](https://raw.githubusercontent.com/Josantonius/PHP-Session/master/src/Session.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Session/master/src/Session.php

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Establecer prefijo para sesiones:

```php
Session::setPrefix($prefix);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $prefix | Prefijo para las sesiones. | object | Sí | |

**# Return** (boolean)

### - Iniciar sesión si la sesión no se ha iniciado:

```php
Session::init();
```

**# Return** (boolean)

### - Añadir valor a una sesión:

```php
Session::set($key, $value);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Nombre de la sesión. | string | Sí | |
| $value | Datos a guardar. | mixed | No | false |

**# Return** (boolean true)

### - Extraer valor y borrar sesión:

```php
Session::pull($key);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Nombre de la sesión a extraer. | string | Sí | |

**# Return** (mixed|null) → valor de la sesión o null si no existe

### - Obtener el valor de la sesión:

```php
Session::get($key, $secondkey);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Nombre de la sesión. | string | No | '' |
| $secondkey | Segunda clave de la sesión. | string|boolean | No | false |

**# Return** (mixed|null) → valor de la sesión o null si no existe

### - Obtener ID de la sesión:

```php
Session::id();
```

**# Return** (string) → sesión ID o vacío

### - Regenerar session_id:

```php
Session::regenerate();
```

**# Return** (string) → el nuevo ID de la sessión

### - Vaciar y destruir sesiones:

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

### - Establecer prefijo para sesiones:

```php
Session::set('name', 'Joseph');
```

### - Iniciar sesión:

```php
Session::init();
```

### - Añadir valor a una sesión:

```php
Session::init();
```

### - Agregar valor múltiple a las sesiones:

```php
$data = [
    'name'     => 'Joseph',
    'age'      => '28',
    'business' => ['name' => 'Company'],
];

Session::set($data);
```

### - Extraer y borrar sesión:

```php
Session::pull('age');
```

### - Obtener el valor de la sesión:

```php
Session::get('name');
```

### - Obtener el valor de la sesión introduciendo dos índices:

```php
Session::get('business', 'name');
```

### - Obtener todos los elementos de la sesión:

```php
Session::get();
```

### - Obtener ID de la sesión:

```php
Session::id();
```

### - Regenerar session_id:

```php
Session::regenerate();
```

### - Destruir un elemento de la sesión:

```php
Session::destroy('name');
```

### - Destruir todas las sesiones con determinado prefijo:

```php
Session::destroy('ses_', true);
```

### - Destruir todas las sesiones:

```php
Session::destroy();
```

## Tests 

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    $ git clone https://github.com/Josantonius/PHP-Session.git
    
    $ cd PHP-Session

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [x] Completar tests
- [x] Mejorar la documentación

## Contribuir

1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

## Repositorio

Los archivos de este repositorio se crearon y subieron automáticamente con [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).