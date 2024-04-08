<?php

    require '../../include/app.php';

    use App\Vendedor;

    estaAutenticado();

    // Validamos que el ID sea un ENTERO
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }
    
    $vendedor = new Vendedor;

    // Consultar Porpiedades por ID
    $vendedor = Vendedor::all();

    $errores = Vendedor::getErrores();

    // Ejecutar el código después de que el usuario envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $args = $_POST['vendedor'];

        $vendedor->sincronizar($args);
        
        $errores = $vendedor->validar();

        // Revisar que el array de $errores este vacío
        if ( empty($errores) ) {
            $vendedor->guardar();
        }

    }

    // Mandamos a llamar la función de incluirTemplates()
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Vendedor</h1>

        <a href="/admin" class="boton boton-verde-inline-block">Volver</a>

        <?php
            foreach($errores as $e) {
        ?>
            <div class="alerta error"> <?php echo $e; ?> </div>
        <?php
            }
        ?>
        
        <form class="formulario" method="POST">
            <?php include '../../include/templates/formulario-vendedores.php'; ?>

            <input type="submit" value="Actualizar Vendedor" class="boton boton-verde-inline-block">
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>