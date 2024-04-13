<?php
    namespace Controllers;

    // El Controlador manda llamar las Vistas

    use Model\Propiedad;
    use Model\Vendedor;
    use MVC\Router;

    class PropiedadController {
        public static function index(Router $router) {
            $propiedades = Propiedad::all();
            $vendedores = Vendedor::all();

            $resultado = null;

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

            $router->render('propiedades/crear', [
                'propiedad' => $propiedad,
                'vendedores' => $vendedores
            ]);
        }

        public static function actualizar() {
            echo "Actualizar";
        }

        public static function eliminar() {
            echo "Eliminar";
        }

    }