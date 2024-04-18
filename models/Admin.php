<?php
    // Aquí tenemos solo lo que contiene la Base de Datos

    namespace Model;

    use Model\ActiveRecord;

    class Admin extends ActiveRecord {
        // Base de datos
        protected static $tabla = 'usuarios';
        protected static $columnasDb = [
            'id',
            'email',
            'password'
        ];

        public $id;
        public $email;
        public $password;

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->email = $args['email'] ?? '';
            $this->password = $args['password'] ?? '';
        }

        public function validar() {
            if (!$this->email) {
                self::$errores[] = "El E-mail es obligatorio";
            }
    
            if (!$this->password) {
                self::$errores[] = "El Password es obligatorio";
            }

            return self::$errores;
        }

        public function existeUsuario() {
            // Revisar si existe el USUARIO
            $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
            
            $resultado = self::$db->query($query);
            
            if (!$resultado->num_rows) {
                self::$errores[] = 'El Usuario no existe!';
                
                return;
            }

            return $resultado;
        }

        public function comprobarPassword($resultado) {
            // fetch_object = trae lo que encontró en la BD
            $usuario = $resultado->fetch_object();

            $autenticado = password_verify($this->password, $usuario->password);

            if (!$autenticado) {
                self::$errores[] = 'El Password es incorrecto!!!';
            }

            return $autenticado;
        }

        public function autenticar() {
            session_start();

            // Llenar el arreglo de sesión
            $_SESSION['usuario'] = $this->email;
            $_SESSION['login'] = true;

            header('Location: /admin');
        }
    }