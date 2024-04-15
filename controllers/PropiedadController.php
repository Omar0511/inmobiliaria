<?php
    namespace Controllers;

    // El Controlador manda llamar las Vistas

    use Model\Propiedad;
    use Model\Vendedor;
    use MVC\Router;
    use Intervention\Image\ImageManagerStatic as Image;

    class PropiedadController {
        public static function index(Router $router) {
            $propiedades = Propiedad::all();
            $vendedores = Vendedor::all();

            $resultado = $_GET['resultado'] ?? null;

            $router->render('propiedades/admin', [
                // key - variable
                'propiedades' => $propiedades,
                'vendedores' => $vendedores,
                'resultado' => $resultado,
            ]);
        }

        public static function crear(Router $router) {
            $propiedad = new Propiedad;
            $vendedores = Vendedor::all();

            // Arreglo con mensaje de errores
            $errores = Propiedad::getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Crea una nueva instancia
                $propiedad = new Propiedad($_POST['propiedad']);

                // Generar nombre único de img
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                if ( $_FILES['propiedad']['tmp_name']['imagen'] ) {
                    // Realiza un resize a la imagen con intervention
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);

                    // Setear la imagen
                    $propiedad->setImagen($nombreImagen);
                }

                $errores = $propiedad->validar();

                // Revisar que el array de $errores este vacío
                if ( empty($errores) ) {
                    // SUBIDA DE ARCHIVOS, Creamos la carpeta            
                    // Validar si una carpeta existe: is_dir();
                    if ( !is_dir(CARPETA_IMAGENES) ) {
                        // Crear carpeta
                        mkdir(CARPETA_IMAGENES);
                    }

                    // Guardar imagen en el servidor
                    $image->save( CARPETA_IMAGENES . $nombreImagen );

                    // Guarda en la BD
                    $propiedad->guardar();
                }

            }

            $router->render('propiedades/crear', [
                'propiedad' => $propiedad,
                'vendedores' => $vendedores,
                'errores' => $errores,
            ]);
        }

        public static function actualizar(Router $router) {
            $id = validarORedirrecionar('/admin');

            // Consultar Porpiedades por ID
            $propiedad = Propiedad::find($id);
            $vendedores = Vendedor::all();

            // Arreglo con mensaje de errores
            $errores = Propiedad::getErrores();

            // Ejecutar el código después de que el usuario envía el formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //debuguear($propiedad);

                $args = $_POST['propiedad'];

                $propiedad->sincronizar($args);
                
                $errores = $propiedad->validar();

                // Generar nombre único de img
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                // Subida de archivos
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    // Realiza un resize a la imagen con intervention
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);            
                    // Setear la imagen
                    $propiedad->setImagen($nombreImagen);
                }

                // Revisar que el array de $errores este vacío
                if ( empty($errores) ) {
                    if ($_FILES['propiedad']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }            

                    $propiedad->guardar();
                }

            }

            $router->render('propiedades/actualizar', [
                'propiedad' => $propiedad,
                'vendedores' => $vendedores,
                'errores' => $errores,
            ]);

        }

        public static function eliminar() {
            if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
                $id = $_POST['id'];
                $id = filter_var( $id, FILTER_VALIDATE_INT);
        
                if ($id) {
                    $tipo = $_POST['tipo'];
        
                    if ( validarTipoContenido($tipo) ) {
        
                        if ($tipo === 'vendedor') {
                            $vendedor = Vendedor::find($id);
        
                            $vendedor->eliminar();
                        } else if ($tipo === 'propiedad') {
                            $propiedad = Propiedad::find($id);
        
                            $propiedad->eliminar();
                        }
        
                    }
                }
                
            }
        }

    }