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
- Iconos
    -
- Tipografía
    -

### Descripción

- Mi primer proyecto creado con PHP y MySQL agregando HTML5, SASS y JavaScript.
- Proyecto para mostrar bienes raíces, aplicando buenas prácticas y optimizando la carga de imágenes y/o archivos.
- Se crea un CRUD para llevar acabo las acciones necesarias para: Crear, Actualizar, Listar y Eliminar las propiedades y los vendedores.

### Sitio
[En construcción](...)

#### Primeros Pasos

1. Al iniciar el proyecto, mediante la consola ejecutaremos el comando:
    - _**npm i**_
        - Sirve para instalar las dependencias.
1. Ejecutamos:
    - _**gulp**_
        - Se creará la carpeta de: _**build**_.
1.

#### Subida de archivos

1. Creamos un archivo:
    - **info.php**
1. Dentro del archivo, ejecutamos la función:
    - **_phpinfo();_**
1. Buscamos la línea:
    - Loaded Configuration File
        - (Debe estar php.ini)
1. Copiamos la ruta, lo pegamos en el buscador y vamos abrir el archivo en VSC
1. Una vez abierto el archivo, buscaremos:
    - **log_errors = On**
        - Nota: debe estar en On, si esta en Off, debemos cambiarlo
1. Seguimos con:
    - **upload_max_filesize = 40M**
    - **max_file_uploads = 20**
    - **post_max_size = 40M**
    - **max_execution_time = 300**
    - **memory_limit = 512M**
1. Después de haber realizado estas configuraciones, debemos reiniciar el servidor, esto lo podemos realizar desde **Servicios**
1. Nota: el archivo: **info.php**, debemos eliminarlo
