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
- MAILTRAP
    - Debemos crear una cuenta, dentro del correo de prueba encontraremos: _Integrations_, seleccionamos el LENGUAJE, en este caso se utilizó: Lavarel 7.x amd 8.x, te da una configuración:
    ```
        MAIL_MAILER=smtp
        MAIL_HOST=sandbox.smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=youruser
        MAIL_PASSWORD=yourpassword
        MAIL_ENCRYPTION=tls
    ```
- PHPMailer
    - Instalación:
        - **_composer require phpmailer/phpmailer_**
    - Configuración: **https://github.com/PHPMailer/PHPMailer**
        ```

        ```


### Descripción

- Mi primer proyecto creado con PHP y MySQL agregando HTML5, SASS y JavaScript.
- Proyecto para mostrar bienes raíces, aplicando buenas prácticas y optimizando la carga de imágenes y/o archivos.
- Se crea un CRUD para llevar acabo las acciones necesarias para: Crear, Actualizar, Listar y Eliminar las propiedades y los vendedores.

### Sitio

[En construcción](...)

#### Primeros Pasos con MVC

# ¿Qué es?

- Patrón de Arquitectura de software que permite la separación de obligaciones de cada pieza de tu código.
- Enfatiza la separación de la lógica de programación con la presentación.
- Es la arquitectura más común hoy en día tanto para web y se utiliza en cualquier lenguaje.

## Ventajas

- Tu aplicación no tendrá mejor performance pero si tendrá un mejor orden de código.
- Al implementar una arquitectura probada como MVC, todos los programadores de un grupo saben exactamente donde encontrar el código encargado de realizar alguna tarea.
- Aprende MVC y cualquier Framework MVC, te será fácil de aprender.

### MVC

- M = Model o Modelo
    - Encargado de todo lo relacionado a los datos y el CRUD.
    - El Modelo se encargará de consultar una base de datos pero no se encarga de mostrar esos datos.

- V = View o Vista
    - Se encarga de todo lo que se ve en la pantalla (HTML).
    - El Modelo se encargará de consultar la base de datos pero es la vista la que se encarga de mostrar los resultados.

- C = Controller o Controlador
    - Es el que comunica Modelo y Vista, antes de que el modelo consulte a la base de datos el Controlador es el encargado de llamarlo, una vez que el Modelo ya consulto la base de datos, es el Controlador quien le comunica a la vista los datos para que los muestre.
- Router
    - Encargado de registrar todas las URL'S o Endpoints que soporta nuestra aplicación.
    - Ejemplo:
        - Si el usuario accede a una URL, el Router ya tiene indicaciones de comunicarse con un Controlador en específico, ese Controlador ya sabe que Modelo va a llamar y que vista va a ejecutar.
    
#### Pasos

- Se crea una carpeta llamada:
    - **_public_**
        - todo lo que esta aquí, es a lo que los usuarios prodrán acceder
- Una vez creada, tenemos que estar dentro de esa carpeta
    - _cd public/_
- Los archivos de:
    - **_composer.json_**
    - **_composer.lock_**
        - deben estar fuera de la carpeta de public
- En caso que estes moviendo todo a un nuevo proyecto, entonces al hacerlo, tienes que ejecutar:
    - **_composer install_**
        - Instalará todas las dependencias
- La carpeta de clases la renombramos por:
    - **_models_**
- Los archivos:
    - **_gulpfile.js_**
        - Dentro del archivo, las rutas que contenga **_build_**, debemos modificarlas por:
        ```
            'build/'

            - Se cambia por:                        
            './public/build/'
        ```
    - **_package.json_**
    - **_package-lock-json_**
        - También se mueven, (tomamos como referencia el proyecto con POO)
        - Ejecutamos: **_npm i_**
- La carpeta de:
    - **_build_**
        - Debe estar en **_public_**
            - Para ello ejecutamos:
                - **_gulp_**
    - La carpeta que estaba en raíz, la puedes borrar, al ejecutar el comando, la creará de nueva cuenta pero ya dentro de **_public_**
- En el archivo, tenemos que cambiar _classes_ por _models_, y el App por Model:
    - **_composer.json_**
    ```
        "autoload": {
            "psr-4": {
                "Model\\" : "./models"
            }
        },
    ```
- Todos los archivos que tenian:
    - **_namespace App_**
    - Lo tenemos que cambiar por:
        **_namespace Model_++
- Cada vez que hagamos un cambio de este tipo, mejor dicho en el composer.json, tenemos que ejecutar:
    - **_composer update_**
- En el archivo: **_composer.json_** agregamos la línea de _MVC_ y _Controllers_:
    ```
        "autoload": {
            "psr-4": {
                "Model\\" : "./models",
                "MVC\\" : "./",
                "Controllers\\" : "./controllers"
            }
        },
    ```
- Volvemos a ejecutar:
    - **_composer update_**
