<?php

    define('TEMPLATES_URL', __DIR__ . '/templates');
    define('FUNCIONES_URL', __DIR__ . './funciones.php');
    define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

    function incluirTemplates(string $nombre, bool $inicio = false) {
        include TEMPLATES_URL . "/$nombre.php";
    }

    function estaAutenticado() {
        session_start();

        if (!$_SESSION['login']) {
            header('Location: /login.php');
        }

    }

    function debuguear($variable) {
        echo "<pre>";
            var_dump($variable);
        echo "</pre>";

        exit;
    }

    // Sanitizar el HTML
    function s($html) : string {
        $s = htmlspecialchars($html);

        return $s;
    }

    function validarTipoContenido($tipo) {
        $tipos = ['vendedor', 'propiedad'];

        /* 
            in_array: Buscar un valor dentro de un arreglo (un string)
            Lo que vamos a buscar esta en: $tipo
            El arreglo donde lo va buscar esta en: $tipos
        */
        return in_array($tipo, $tipos);
    }

    // Muestra los mensajes de RESULTADO
    function mostrarNotificacion($codigo) {
        $mensaje = '';

        switch($codigo) {
            case 1:
                $mensaje = 'Creado Correctamente';
                break;
            case 2:
                $mensaje = 'Actualizado Correctamente';
                break;
            case 3:
                $mensaje = 'Eliminado Correctamente';
                break;
            default: 'Opción inválida';
            break;
        }

        return $mensaje;
    }

    function validarORedirrecionar(string $url) {
        // Validamos que el ID sea un ENTERO
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header("Location: $url");
        }

        return $id;
    }