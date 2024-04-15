<?php

    require __DIR__ . '/../include/app.php';

    use MVC\Router;
    use Controllers\PropiedadController;
    use Controllers\VendedorController;

    $router = new Router();

    // Propiedades
    $router->get('/admin', [PropiedadController::class, 'index']);
    $router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
    $router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
    $router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
    $router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
    $router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

    // Vendedores
    $router->get('/vendores/crear', [VendedorController::class, 'crear']);
    $router->post('/vendores/crear', [VendedorController::class, 'crear']);
    $router->get('/vendores/actualizar', [VendedorController::class, 'actualizar']);
    $router->post('/vendores/actualizar', [VendedorController::class, 'actualizar']);
    $router->post('/vendores/eliminar', [VendedorController::class, 'eliminar']);

    $router->comprobarRutas();
    