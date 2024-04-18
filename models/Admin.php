<?php
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

    }