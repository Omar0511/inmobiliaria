<?php
    namespace App;

    // Heredamos de ActiveRecord
    class Propiedad extends ActiveRecord {
        protected static $tabla = 'propiedades';

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

        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->titulo = $args['titulo'] ?? '';
            $this->precio = $args['precio'] ?? '';
            $this->imagen = $args['imagen'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
            $this->habitaciones = $args['habitaciones'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->estacionamiento = $args['estacionamiento'] ?? '';
            $this->creado = date('Y-m-d');
            $this->vendedor_id = $args['vendedor_id'] ?? '';
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

    }