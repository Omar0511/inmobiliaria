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

            $router->render('vendedores/actualizar', [

            ]);
        }

        public static function eliminar() {

        }

    }