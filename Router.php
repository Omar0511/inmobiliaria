<?php
    namespace MVC;

    class Router {
        public $rutasGET = [];
        public $rutasPOST = [];

        public function get($url, $fn) {
            $this->rutasGET[$url] = $fn;
        }

        public function post($url, $fn) {
            $this->rutasPOST[$url] = $fn;
        }

        public function comprobarRutas() {
            session_start();

            $auth = $_SESSION['login'] ?? null;

            // Arreglo de rutas protegidas
            $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

            $urlActual = $_SERVER['PATH_INFO'] ?? '';

            $metodo = $_SERVER['REQUEST_METHOD'];

            if ($metodo === 'GET') {
                $fn = $this->rutasGET[$urlActual] ?? null;
            } else {
                $fn = $this->rutasPOST[$urlActual] ?? null;
            }

            // Proteger las rutas
            if ( in_array($urlActual, $rutas_protegidas) && !$auth ) {
                header('Location: /index');
            }

            if ($fn) {
                // La URL existe y hay una función asociada

                // Nos permite llamar una función, que no sabemos como se llama
                call_user_func($fn, $this);
            } else {
                echo "Página NO encontrada";
            }

        }

        // Muestra una Vista (Views)
        public function render($view, $datos = []) {
            foreach ($datos as $key => $value) {
                /*
                    $$
                    Variable de Variable, es decir; 
                    Como se van a pasar muchos datos,
                    NO sabemos que NOMBRE van a tener esas variables.
                */
                $$key = $value;
            }
            // Inicia un almacenamiento en memoria
            ob_start();

            include __DIR__ . "/views/$view.php";

            // Limpia la memoria (vista)
            $contenido = ob_get_clean();

            include __DIR__ . "/views/layout.php";
        }

    }