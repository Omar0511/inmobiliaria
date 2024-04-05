# Proyecto Inmobiliaria

## Tecnologías y/o Herramientas Utilizadas

- HTML5
- SASS
- JavaScript
- PHP
- MySQL
- VIsual Studio Code
- npm
- npx
- Modernizr
- Tipografía
    - Lato, sans-serif
- GitHub
    - Ramas
        - **_main_**
            - Código Spaguetti
        - **_2.0_**
            - POO
        - **_3.0_**
            - MVC
- Intervention Image
    - Instalación por consola:
        - **_composer require intervention/image:^2_**
    - Ejemplo de configuración:
        ```
            Static Example

            // include composer autoload
            require 'vendor/autoload.php';

            // import the Intervention Image Manager Class
            use Intervention\Image\ImageManagerStatic as Image;

            // and you are ready to go ...
            $image = Image::make('public/foo.jpg')->resize(300, 200);
        ```
    - Extensión:
        - _PHP NAMESPACE RESOLVER_
        - Te autocompleta cuando manda llamar las Clases o Instancias de las mismas
            - Ejemplo: **use App\Propiedad;**

### Descripción

- Mi primer proyecto creado con PHP y MySQL agregando HTML5, SASS y JavaScript.
- Proyecto para mostrar bienes raíces, aplicando buenas prácticas y optimizando la carga de imágenes y/o archivos.
- Se crea un CRUD para llevar acabo las acciones necesarias para: Crear, Actualizar, Listar y Eliminar las propiedades y los vendedores.

### Sitio

[En construcción](...)

#### Primeros Pasos con POO

1. Creamos la carpeta de:
    - classes
1. En consola:
    - **_composer init_**
1. Nos arrojará una serie de preguntas:
    - Package name
        - Damos Enter
    - Description
        - Tu descripción
    - Author
        - Damos Enter
    - Minimum Stability
        - Damos Enter
    - Package Type
        - project
    - License
        - Damos Enter
    - require interactively
        - no
    - require-dev interactively
        - no
    - PSR-4
        - Damos Enter
    - Confirm generation?
        - yes
    - Nos preguntará si deseamos agregar **_vendor_** al **_.gitignore_**
        - Tecleamos: **yes**
    - Nota: esta carpeta no es necesario subirla al repositorio ni al servidor, con el:
        - **_composer.json_**
        - podemos conocer las dependencias que necesitará el proyecto
    - En el archivo:
        - **_composer.json_**
            ```
                "autoload": {
                    "psr-4": {
                        "App\\" : "./classes"
                    }
                },
            ```
    - Después de haber configurado lo anterior, ingresamos:
        - **_composer update_**
    - Nos creará:
        - **_composer.lock_**

## Active Record

- Es un patrón de Arquitectura que se utiliza para aplicaciones que almacenan datos en BDS y CRUD.

### ¿Cómo funciona?

1. Cada tabla en la bd tiene una clase que contiene los mismos atributos que columnas de la BD.
1. Estos atributos se "mapean" utilizando la clase como el puente para tener un objetos con esos datos.
1. Es decir, se crea un objeto cen memoria que es igual a lo que tenemos en la BD.
1. Active Record mantiene y lee los cambios que se van haciendo en estos atributos.
1. Ideal para trabajar con CRUD.
1. Se crean algunos métodos:
    - $propiedad->guardar();
    - $propiedad->actualizar();
    - $propiedad->eliminar();
    - $propiedad->find();
    - $propiedad->all();
