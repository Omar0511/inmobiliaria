<?php

    require __DIR__ . '/../include/app.php';

    use MVC\Router;

    $router = new Router();

    $router->get();

    $router->comprobarRutas();