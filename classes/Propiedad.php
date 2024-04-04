<?php
    namespace App;

    class Propiedad {
        // Base de Datos
        protected static $db;

        protected static $columnasDB = [
            'id',
            'titulo',
            'precio',
            'imagen',
            'descripcion',
            'habitaciones',
            'wc',
            'estacionamiento',
            'creado',
            'vendedor_id',
        ];

        // Errores
        protected static $errores = [];

        // Atributos, son los campos que están en la BD
        public $id;
        public $titulo;
        public $precio;
        public $imagen;
        public $descripcion;
        public $habitaciones;
        public $wc;
        public $estacionamiento;
        public $creado;
        public $vendedor_id;

        /*
            public: vas hacer referencia a él como: $this->
            self: hace referencia a los atributos estáticos de una clase,
                se hace referencia con: :: (dos puntos)
                ejemplo: Propiedad::$db, pero como usamos: static, quedaría:
                self::$db;
                Nota: al ser: 'static',
                NO se requiere INSTANCIAR
        */
        public static function setDB($database) {
            self::$db = $database;
        }

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? '';
            $this->titulo = $args['titulo'] ?? '';
            $this->precio = $args['precio'] ?? '';
            $this->imagen = $args['imagen'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
            $this->habitaciones = $args['habitaciones'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->estacionamiento = $args['estacionamiento'] ?? '';
            $this->creado = date('Y/m/d');
            $this->vendedor_id = $args['vendedor_id'] ?? '';
        }

        public function guardar() {
            // Sanitizar los datos
            $atributos = $this->sanitizarAtributos();

            // INSERT a la BD
            // $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedor_id) VALUES ('$this->titulo', '$this->precio', '$this->imagen', '$this->descripcion', '$this->habitaciones', '$this->wc', '$this->estacionamiento', '$this->creado', '$this->vendedor_id')";

            // Crea un nuevo String a partir de un Arreglo
            //$stringJoin = join(', ', array_keys($atributos) );

            $query = "INSERT INTO propiedades ( ";
            $query .= join(', ', array_keys($atributos) );
            $query .= " ) VALUES (' ";
            $query .=  join("', '", array_values($atributos) );
            $query .= " ')" ;

            $resultado = self::$db->query($query);

            return $resultado;
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
                $sanitizado[$key] = self::$db->escape_string($value);
            }

            return $sanitizado;

        }

        public function setImagen($imagen) {
            // Asignar al atributo de imagen el nombre de la imagen
            if ($imagen) {
                $this->imagen = $imagen;
            }
        }

        public static function getErrores() {
            return self::$errores;
        }

        public function validar() {
            if (!$this->titulo) {
                self::$errores[] = "El Título es obligatorio";
            }
    
            if (!$this->precio) {
                self::$errores[] = "El Precio es obligatorio";
            }
    
            if ( strlen( $this->descripcion) < 50 ) {
                self::$errores[] = "La Descripción debe tener minímo 50 carácteres...";
            }
    
            if (!$this->habitaciones) {
                self::$errores[] = "Las Habitaciones son obligatorias";
            }
    
            if (!$this->wc) {
                self::$errores[] = "El WC es obligatorio";
            }
    
            if (!$this->estacionamiento) {
                self::$errores[] = "El Estacionamiento es obligatorio";
            }
    
            if (!$this->vendedor_id) {
                self::$errores[] = "El Vendedor es obligatorio";
            }
    
            if (!$this->imagen) {
                self::$errores[] = 'La Imagen es obligatoria';
            }
    
            return self::$errores;
        }

        // Listar todas las propiedades
        public static function all() {
            $query = "SELECT * FROM propiedades";

            // $resultado = self::$db->query($query);
            // $resultado = self::consultarSQL($query);
            self::consultarSQL($query);
        }

        public static function consultarSQL($query) {
            // Consultar la BD
            $resultado = self::$db->query($query);

            // Iterar los resultados
            $array = [];

            while ($registro = $resultado->fetch_assoc() ) {
                // $array = $registro[''];
                $array = self::crearObjeto($registro);
            }

            // Liberar memoria
            $resultado->free();

            // Retornar los resultados
            return $array;
        }

        // ActiveRecord acepta OBJETOS por lo que un ARRAY se tiene que convertir a OBJETO
        protected static function crearObjeto($registro) {
            // new self, indica de la CLASE PADRE (Propiedad)
            $objeto = new self;

            foreach ($registro as $key => $value) {
                if (property_exists($objeto, $key)) {
                    $objeto->$key = $value;
                }

            }

            return $objeto;
        }
    }