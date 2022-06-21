# Contribución

Nos encantaría que contribuyeras a este proyecto y ayudaras a mejorarlo.
Estas son las directrices que nos gustaría que siguieras:

---

- [Código de conducta](#código-de-conducta)
- [Preguntas, problemas o ideas](#preguntas-problemas-o-ideas)
- [Agregar o mejorar algo](#agregar-o-mejorar-algo)
- [Reportar un error](#reportar-un-error)
- [Enviar un _issue_](#enviar-un-issue)
- [Enviar un _pull request_](#enviar-un-pull-request)
  - [Después de fusionar tu _pull request_](#después-de-fusionar-tu-pull-request)
- [Reglas de codificación](#reglas-de-codificación)
- [Reglas para escribir _commits_](#reglas-para-escribir-commits)
  - [Cabecera del _commit_](#cabecera-del-commit)
    - [Tipo](#tipo)
    - [Ámbito](#ámbito)
    - [Resumen](#resumen)
  - [Cuerpo del _commit_](#cuerpo-del-commit)
  - [Parte inferior del _commit_](#parte-inferior-del-commit)

---

## Código de conducta

Ayúdanos a mantener este proyecto accesible e inclusivo.
Por favor, lee y sigue nuestro [código de conducta](CODE_OF_CONDUCT.md).

## Preguntas, problemas o ideas

Empieza una [nueva discusión](https://github.com/josantonius/php-session/discussions/new) y selecciona
la categoría adecuada para ello:

- `General`: Cualquier cosa que sea relevante para el proyecto.
- `Ideas`: Ideas para mejorar el proyecto o proponer nuevas características.
- `Encuestas (polls)`: Encuestas con múltiples opciones para que la comunidad.
- `Q&A`: Preguntas para que la comunidad responda.
- `Mostrar y contar (show and tell)`: Creaciones, experimentos o pruebas.

## Agregar o mejorar algo

- Para un **cambio importante**,
abre una [nueva discusión](https://github.com/josantonius/php-session/discussions/new) en la categoría
_`Ideas`_ y expón tu propuesta para que pueda ser discutida. Esto también nos permitirá coordinar
mejor nuestros esfuerzos, evitar la duplicación del trabajo y ayudarte a elaborar el cambio para
que sea para que sea aceptado con éxito en el proyecto.

- **Pequeñas características** pueden desarrollarse
y [enviar directamente un _pull request_](#enviar-un-pull-request).

## Reportar un error

Si encuentras un error en el código, puedes ayudarnos
[enviando un _issue_](#enviar-un-issue) a nuestro
[repositorio](https://github.com/josantonius/php-session). O mejor aún, puedes
[enviar un _pull request_](#enviar-un-pull-request) con una solución.

## Enviar un _issue_

Los reportes de problemas son muy valiosos para cualquier proyecto.

Los grandes informes de errores suelen tener:

- Un resumen rápido y/o antecedentes.
- Pasos para reproducir el problema.
- Ser específico.
- Dar un ejemplo de código si se puede.
- Lo que se esperaba que ocurriera.
- Lo que realmente sucede.
- Notas; por qué podría estar sucediendo, pruebas que no funcionaron...

[Envía un nuevo _issue_](https://github.com/josantonius/php-session/issues/new) para reportar un error.

## Enviar un _pull request_

Los _pull request_ son una gran manera de incluir tus ideas en este proyecto
o simplemente arreglar algo.

Antes de enviar tu _pull request_ ten en cuenta las siguientes directrices:

1. Busca en [GitHub](https://github.com/josantonius/php-session/pulls) si existe algún tema relacionado
para asegurarte que no esté repetido.

1. [Bifurca](https://github.com/josantonius/php-session/fork) el repositorio a tu propia cuenta de GitHub.

1. Clona el repositorio en tu máquina.

1. Sitúate en el repositorio clonado.

     ```shell
     cd php-session
     ```

1. Crea una rama a partir de la rama `main` con un nombre corto pero descriptivo.

     ```shell
     git checkout -b descriptive-name main
     ```

1. Realiza tus cambios en la nueva rama, incluyendo las pruebas necesarias.

1. Sigue nuestras [reglas de codificación](#reglas-de-codificación).

1. Ejecuta el conjunto de pruebas del repositorio completo.

     ```shell
     composer tests
     ```

1. Confirma tus cambios utilizando un _commit_ descriptivo que siga nuestras
  [reglas para escribir _commits_](#reglas-para-escribir-commits).

     ```shell
     git commit -a
     ```

    **La opción `-a` agregará (`add`) y eliminará (`rm`) los archivos editados.**

1. Envía (_push_) tu rama a GitHub:

    ```shell
    git push origin descriptive-name
    ```

1. En GitHub, envía un [_pull request_](https://github.com/josantonius/php-session/compare/main..)
hacia `php-session:main`.

- Si te sugerimos algún cambio:
  - Realiza las actualizaciones necesarias.
  - Vuelve a ejecutar las pruebas para asegurarse de que siguen pasando.
  - Reorganiza tu rama y envíala a tu repositorio de GitHub (esto actualizará tu _pull request_):

    ```shell
    git rebase main -i
    git push -f
    ```

¡Eso es todo! ¡Gracias por tu contribución!

### Después de fusionar tu _pull request_

Después de que tu _pull request_ se fusione, puedes eliminar con seguridad tu rama y actualizar los
cambios desde la rama `main`:

- Elimina la rama remota en GitHub, ya sea a través de la interfaz de GitHub o de tu _shell_ local:

    ```shell
    git push origin --delete descriptive-name
    ```

- Sitúate en la rama `main`:

    ```shell
    git checkout main -f
    ```

- Elimina la rama local:

    ```shell
    git branch -D descriptive-name
    ```

- Actualiza tu rama _`main`_ con la última versión:

    ```shell
    git pull --ff upstream main
    ```

## Reglas de codificación

Para garantizar la coherencia en todo el código fuente, ten en cuenta estas reglas mientras trabajas:

- Todas las características o correcciones de errores **deben ser probadas** por una o más
especificaciones (pruebas unitarias).

  Puedes utilizar el siguiente comando para comprobar las pruebas:

    ```shell
    composer phpunit
    ```

- Toda nueva característica **debe ser documentada** en el archivo `README.md`.

- Utilizamos `PHP CodeSniffer` y `PHP Mess Detector` para definir nuestros estándares de código.

  Puedes utilizar los siguientes comandos para comprobar el estado de tu código:

    ```shell
    composer phpcs
    ```

    ```shell
    composer phpmd
    ```

  Puedes utilizar el siguiente comando para formatear automáticamente
los errores encontrados con `PHP CodeSniffer`:

    ```shell
    composer fix
    ```

## Reglas para escribir _commits_

Tenemos reglas muy precisas sobre cómo deben ser formateados nuestros _commits_.
Este formato hace que el historial _commits_ sea más fácil de leer.

Cada _commit_ consta de un **_header_**, un **_body_**, y un **_footer_**.

```none
<header>
<LÍNEA EN BLANCO>
<body>
<LÍNEA EN BLANCO>
<footer>
```

El _`header`_ es obligatorio y debe ajustarse al formato para el
[encabezado del _commit_](#cabecera-del-commit).

El _`body`_ es opcional. Cuando está presente, debe tener al menos 20 caracteres y debe
ajustarse al formato del [cuerpo del _commit_](#cuerpo-del-commit).

El _`footer`_ es opcional.
El formato para la [parte inferior del _commit_](#parte-inferior-del-commit) detalla su estructura.

### Cabecera del _commit_

```none
<tipo>(<ámbito>): <resumen corto>
  │          │          │
  │          │          └─> # Resumen en tiempo presente. Sin mayúsculas. Sin punto al final.
  │          │
  │          └─> # Palabra corta relevante. Sin mayúsculas.
  │
  └─> # Tipo de commit: build|ci|docs|feat|fix|perf|refactor|test.
```

Los campos `<tipo>` y `<summary>` son obligatorios, el campo `(<ámbito>)` es opcional.

#### Tipo

Debe ser uno de los siguientes:

- `build`: Cambios que afectan al sistema de compilación o a las dependencias externas.
- `ci`: Cambios en nuestros archivos de configuración y scripts de CI.
- `docs`: Cambios en documentación.
- `feat`: Nuevas características.
- `fix`: Arreglar un error.
- `perf`: Cambios en el código que mejoran el rendimiento.
- `refactor`: Cambio de código que no corrige un error ni añade una característica.
- `test`: Añadir pruebas que faltan o corregir las existentes.

#### Ámbito

Se puede proporcionar un ámbito al tipo del _commit_ para proporcionar información contextual
adicional. Éste debería ir entre paréntesis. Por ejemplo:

```none
feat(parser): add ability to parse arrays
```

#### Resumen

Utiliza el campo de resumen para proporcionar una descripción sucinta del cambio:

- Utiliza el imperativo y el tiempo presente: "_change_" en vez de "_changed_" o "_changes_".
- No escribas la primera letra en mayúscula.
- No pongas punto (.) al final.
- Utiliza el inglés.

### Cuerpo del _commit_

Al igual que en el resumen del _commit_, utiliza el imperativo y el tiempo presente:
"_fix_" en vez de "_fixed_" o "_fixes_".

Explica la motivación del cambio en el cuerpo del _commit_. Este _commit_ debe explicar por qué
estas haciendo el cambio. Puede incluir una comparación del comportamiento anterior con el nuevo
comportamiento para ilustrar el impacto del cambio.

### Parte inferior del _commit_

El _footer_ puede contener información sobre cambios de última hora o declarados obsoletos.
También es el lugar para hacer referencia a los _issues_ de GitHub y a otros _PRs_ que ese _commit_
cierra o con los que está relacionado.
Por ejemplo:

```none
BREAKING CHANGE: <resumen de cambios de última hora>
<LÍNEA EN BLANCO>
<descripción de los cambios de última hora + instrucciones de migración>
<LÍNEA EN BLANCO>
<LÍNEA EN BLANCO>
Fixes #<número de issue>
```

o

```none
DEPRECATED: <qué es lo que está obsoleto>
<LÍNEA EN BLANCO>
<descripción de la desaprobación + ruta de actualización recomendada>
<LÍNEA EN BLANCO>
<LÍNEA EN BLANCO>
Closes #<número de pull request>
```

La sección de cambios de última hora debe comenzar con la frase "_BREAKING CHANGE_:" seguida de un
resumen del cambio, una línea en blanco y una descripción detallada del cambio que incluya también
instrucciones de migración.

Del mismo modo, una sección de desaprobación debe comenzar con "_DEPRECATED_:" seguido de una breve
descripción sobre lo que quedó obsoleto, una línea en blanco y una descripción detallada que también
recomiende una alternativa.

> Esta guía de contribución está inspirada en la
[guía de contribución de Angular](https://github.com/angular/angular/blob/main/CONTRIBUTING.md).
