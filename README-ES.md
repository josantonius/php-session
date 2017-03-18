# PHP Session library

[![Latest Stable Version](https://poser.pugx.org/josantonius/session/v/stable)](https://packagist.org/packages/josantonius/session) [![Total Downloads](https://poser.pugx.org/josantonius/session/downloads)](https://packagist.org/packages/josantonius/session) [![Latest Unstable Version](https://poser.pugx.org/josantonius/session/v/unstable)](https://packagist.org/packages/josantonius/session) [![License](https://poser.pugx.org/josantonius/session/license)](https://packagist.org/packages/josantonius/session)

[English version](README.md)

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
- [Licencia](#licencia)
- [Copyright](#copyright)

---

### Instalación 

La mejor forma de instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar PHP Session library, simplemente escribe:

    $ composer require Josantonius/Session

El comando anterior solamente instalará los archivos necesarios, si prefieres descargar todo el código, incluyendo tests, puedes utilizar:

    $ composer require Josantonius/Session --prefer-source

También puedes clonar el repositorio completo con Git:

	$ git clone https://github.com/Josantonius/PHP-Session.git

### Requisitos

Esta ĺibrería es soportada por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

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

var_dump(Session::get('name')); # string(6) "Joseph"
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
SessionTest::testDestroyAllSessionsWithPrefix();
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

### Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).