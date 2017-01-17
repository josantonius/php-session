# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/session/v/stable)](https://packagist.org/packages/josantonius/session) [![Total Downloads](https://poser.pugx.org/josantonius/session/downloads)](https://packagist.org/packages/josantonius/session) [![Latest Unstable Version](https://poser.pugx.org/josantonius/session/v/unstable)](https://packagist.org/packages/josantonius/session) [![License](https://poser.pugx.org/josantonius/session/license)](https://packagist.org/packages/josantonius/session)

[Spanish version](README-ES.md)

Librería PHP para manejo de sesiones.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Métodos disponibles](#métodos-disponibles)
- [Uso](#uso)
- [Tests](#tests)
- [Manejador de excepciones](#manejador-de-excepciones)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Autor](#autor)
- [Licencia](#licencia)

---

### Instalación 

La mejor forma de instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar PHP Session library, simplemente escribe:

    $ composer require Josantonius/Session

### Requisitos

Esta ĺibrería es soportada por versiones de PHP 7.0 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

Para utilizar esta librería en HHVM (HipHop Virtual Machine) tendrás que activar los tipos escalares. Añade la siguiente ĺínea "hhvm.php7.scalar_types = true" en tu "/etc/hhvm/php.ini".

### Cómo empezar y ejemplos

Para utilizar esta librería, simplemente:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Session\Session;
```
### Métodos disponibles

Métodos disponibles en esta librería:

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
### Uso

Ejemplo de uso para esta librería:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Session\Session;

Session::init();

Session::set('name', 'Joseph');

var_dump(Session::get('name'));
```

### Tests 

Para utilizar la clase de [pruebas](tests), simplemente:

```php
<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$loader->addPsr4('Josantonius\\Session\\Tests\\', __DIR__ . '/vendor/josantonius/session/tests');

use Josantonius\Session\Tests\SessionTest;
```
Métodos de prueba disponibles en esta librería:

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

### Manejador de excepciones

Esta librería utiliza [control de excepciones](src/Exception) que puedes personalizar a tu gusto.
### Contribuir
1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Repositorio

Los archivos de este repositorio se crearon y subieron automáticamente con [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### Autor

Mantenido por [Josantonius](https://github.com/Josantonius/).

### Licencia

Este proyecto está licenciado bajo la **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.