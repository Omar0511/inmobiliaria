<?php
    namespace Controllers;

    use MVC\Router;

    class VendedorController {
        public static function index(Router $router) {

            $router->render('vendedores/admin', [

            ]);
        }

        public static function crear(Router $router) {

            $router->render('vendedores/admin', [

            ]);
        }

        public static function actualizar(Router $router) {

            $router->render('vendedores/admin', [

            ]);
        }

        public static function eliminar() {

            $router->render('vendedores/admin', [

            ]);
        }

    }