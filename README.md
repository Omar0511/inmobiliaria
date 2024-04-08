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
- Composer
- Active Record
- GitHub
    - Ramas
        1. _main_: **Código Spaguetti**
        1. **_POO_**
        1. **_MVC_**
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

#### Primeros Pasos con MVC