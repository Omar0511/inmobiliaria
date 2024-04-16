<?php

    require __DIR__ . '/../include/app.php';

    use MVC\Router;
    use Controllers\PaginasController;
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
    $router->get('/vendedores/crear', [VendedorController::class, 'crear']);
    $router->post('/vendedores/crear', [VendedorController::class, 'crear']);
    $router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
    $router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
    $router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

    // Páginas

    $router->comprobarRutas();
    