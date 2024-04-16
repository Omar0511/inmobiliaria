<?php
    namespace Controllers;

    use Model\Propiedad;
    use MVC\Router;

    class PaginasController {
        public static function index(Router $router) {
            $propiedades = Propiedad::get(3);
            
            $inicio = true;

            $router->render('paginas/index', [
                'propiedades' => $propiedades,
                'inicio' => $inicio,
            ]);
        }

        public static function nosotros(Router $router) {
            $router->render('paginas/nosotros', [

            ]);
        }

    }