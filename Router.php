<?php
    namespace MVC;

    class Router {
        public $rutasGET = [];
        public $rutasPOST = [];

        public function get($url, $fn) {
            $this->rutasGET[$url] = $fn;
        }

        public function comprobarRutas() {
            $urlActual = $_SERVER['PATH_INFO'] ?? '';

            $metodo = $_SERVER['REQUEST_METGOD'];

            if ($metodo === 'GET') {
                $fn = $this->rutasGET[$urlActual] ?? null;
            }

            if ($fn) {
                // La URL existe y hay una función asociada

                // Nos permite llamar una función, que no sabemos como se llama
                call_user_func($fn, $this);
            } else {

            }

        }
    }