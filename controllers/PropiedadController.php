<?php
    namespace Controllers;

    // El Controlador manda llamar las Vistas
    use MVC\Router;

    class PropiedadController {
        public static function index(Router $router) {
            $router->render('propiedades/admin', [
                'mensaje' => 'Desde la vista'
            ]);
        }

        public static function crear() {
            echo "Crear";
        }

        public static function actualizar() {
            echo "Actualizar";
        }

        public static function eliminar() {
            echo "Eliminar";
        }

    }