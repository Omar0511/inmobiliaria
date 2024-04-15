<?php
    namespace Controllers;

    use Model\Vendedor;
    use MVC\Router;

    class VendedorController {
        public static function crear(Router $router) {
            $errores = Vendedor::getErrores();

            $vendedor = new Vendedor;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $vendedor = new Vendedor( $_POST['vendedor'] );
        
                $errores = $vendedor->validar();
        
                if ( empty($errores) ) {
                    $vendedor->guardar();
                }
        
            }

            $router->render('vendedores/crear', [
                'errores' => $errores,
                'vendedor' => $vendedor,
            ]);
        }

        public static function actualizar(Router $router) {
            $errores = Vendedor::getErrores();
            
            // Validamos que el ID sea un ENTERO
            $id = validarORedirrecionar('/admin');
            
            $vendedor = Vendedor::find($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $args = $_POST['vendedor'];

                $vendedor->sincronizar($args);
                
                $errores = $vendedor->validar();

                // Revisar que el array de $errores este vacío
                if ( empty($errores) ) {
                    $vendedor->guardar();
                }

            }

            $router->render('vendedores/actualizar', [
                'vendedor' => $vendedor,
                'errores' => $errores,
            ]);
        }

        public static function eliminar() {

        }

    }