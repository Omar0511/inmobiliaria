<?php

    namespace App;

    class ActiveRecord {
        // Base de Datos
        protected static $conexion;
        protected static $columnasDB = [];
        protected static $tabla = '';
        // Errores
        protected static $errores = [];

        /*
            public: vas hacer referencia a él como: $this->
            self: hace referencia a los atributos estáticos de una clase,
                se hace referencia con: :: (dos puntos)
                ejemplo: Propiedad::$conexion, pero como usamos: static, quedaría:
                self::$conexion;
                Nota: al ser: 'static',
                NO se requiere INSTANCIAR
        */
        public static function setDB($database) {
            self::$conexion = $database;
        }

        public function guardar() {
            if ( !is_null($this->id) ) {
                // Actualizar
                $this->actualizar();
            } else {
                // Crear nuevo registro
                $this->crear();
            }
        }

        public function crear() {
            // Sanitizar los datos
            $atributos = $this->sanitizarAtributos();

            // INSERT a la BD
            // Crea un nuevo String a partir de un Arreglo
            //$stringJoin = join(', ', array_keys($atributos) );

            $query = "INSERT INTO "  . static::$tabla . " ( ";
            $query .= join(', ', array_keys($atributos) );
            $query .= " ) VALUES ('";
            $query .=  join("', '", array_values($atributos) );
            $query .= " ')" ;
            // debuguear($query);

            $resultado = self::$conexion->query($query);

            if ($resultado) {
                header('Location: /admin?resultado=1');
            }

        }

        public function actualizar() {
            // Sanitizar los datos
            $atributos = $this->sanitizarAtributos();

            $valores = [];

            foreach ($atributos as $key => $value) {
                $valores[] = "{$key}='{$value}'";
            }

            // join, los une pero los separa por una coma
            //debuguear( join(', ', $valores) );

            $query = "UPDATE " . static::$tabla . " SET ";
            $query .= join(', ', $valores );
            $query .= " WHERE id = '" . self::$conexion->escape_string($this->id) . "' ";
            $query .= " LIMIT 1 ";

            $resultado = self::$conexion->query($query);

            if ($resultado) {
                header('Location: /admin?resultado=2');
            }

        }

        // Eliminar un registro
        public function eliminar() {
            $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$conexion->escape_string($this->id) . " LIMIT 1";

            $resultado = self::$conexion->query($query);

            if ($resultado) {
                $this->borrarImagen();

                header('Location: /admin?resultado=3');
            }

        }

        // Identificar y unir los atributos de la BD
        public function atributos() {
            $atributos = [];

            foreach(self::$columnasDB as $columna) {
                if ($columna === 'id') {
                    continue;
                }

                $atributos[$columna] = $this->$columna;
            }

            return $atributos;
        }

        public function sanitizarAtributos() {
            $atributos = $this->atributos();
            $sanitizado = [];

            foreach($atributos as $key => $value) {
                $sanitizado[$key] = self::$conexion->escape_string($value);
            }

            return $sanitizado;

        }

        public function setImagen($imagen) {
            // Elimina la imagen previa
            if ( !is_null($this->id) ) {
                $this->borrarImagen();
            }

            // Asignar al atributo de imagen el nombre de la imagen
            if ($imagen) {
                $this->imagen = $imagen;
            }

        }

        // Eliminar imagen
        public function borrarImagen() {
            // Comprobar si existe el archivo
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

            if ($existeArchivo) {
                // unlink = borrar
                unlink(CARPETA_IMAGENES . $this->imagen);
            }

        }

        public static function getErrores() {
            return static::$errores;
        }

        public function validar() {
            static::$errores = [];

            return static::$errores;
        }

        // Listar todas las propiedades
        public static function all() {
            /**
             * static: 
             * va HEREDAR el método y buscará el atributo en la clase
             * que se esta HEREDANDO
            */
            $query = "SELECT * FROM " . static::$tabla;

            // $resultado = self::$conexion->query($query);
            // $resultado = self::consultarSQL($query);
            $resultado = self::consultarSQL($query);

            return $resultado;
        }

        // Busca un registro por ID
        public static function find($id) {
            $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";

            $resultado = self::consultarSQL($query);

            // array_shift: retorna el primer elemento de un arreglo
            return array_shift($resultado);
        }

        public static function consultarSQL($query) {
            // Consultar la BD
            $resultado = self::$conexion->query($query);

            // Iterar los resultados
            $array = [];

            while ($registro = $resultado->fetch_assoc() ) {
                // $array = $registro[''];
                $array[] = self::crearObjeto($registro);
            }

            // Liberar memoria
            $resultado->free();

            // Retornar los resultados
            return $array;
        }

        // ActiveRecord acepta OBJETOS por lo que un ARRAY se tiene que convertir a OBJETO
        protected static function crearObjeto($registro) {
            // new self, indica de la CLASE PADRE (Propiedad)
            // $objeto = new self;

            // static: crea un nuevo objeto en la clase que se esta HEREDANDO
            $objeto = new static;

            foreach ($registro as $key => $value) {
                if (property_exists($objeto, $key)) {
                    $objeto->$key = $value;
                }

            }

            return $objeto;
        }

        // Sincronizar el objeto en memoria con los cambios realizados por el usuario
        public function sincronizar( $args = []) {
            foreach($args as $key => $value) {
                if (property_exists($this, $key) && !is_null($value)) {
                    $this->$key = $value;
                }
            }
        }

    }