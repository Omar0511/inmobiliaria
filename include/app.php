<?php
    
    /* 
        Nombre , Ruta
        ? define('TEMPLATES_URL', '/templates');
        
        ! __DIR__ = sirve para agregar la ubicación del DIRECTORIO actual, es decir;
        *estamos en: app.php, entonces para entrar a la ruta de templates, solo es /templates
    */

    define('TEMPLATES_URL', __DIR__ . '/templates');
    define('FUNCIONES_URL', __DIR__ . './funciones.php');