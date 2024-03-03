<?php

    require 'app.php';

    /* 
        ? Nota: los archivos de incluir, solo llevan la apertura de PHP, sin el cierre
        
        ! Esto es antes de inlucuir el app.php
        function incluirTemplates($nombre) {
            include "includes/templates/$nombre.php";
        }
    */

    function incluirTemplates(string $nombre, bool $inicio = false) {
        include TEMPLATES_URL . "/$nombre.php";
    }