<?php

    require '../../include/app.php';

    use App\Vendedor;

    estaAutenticado();

    $vendedor = new Vendedor;

    $errores = Vendedor::getErrores();

    // Ejecutar el código después de que el usuario envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $vendedor = new Vendedor( $_POST['vendedor'] );

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
        <h1>Crear Vendedor</h1>

        <a href="/admin" class="boton boton-verde-inline-block">Volver</a>

        <?php
            foreach($errores as $e) {
        ?>
            <div class="alerta error"> <?php echo $e; ?> </div>
        <?php
            }
        ?>
        
        <form action="/admin/vendedores/crear.php" class="formulario" method="POST">
            <?php include '../../include/templates/formulario-vendedores.php'; ?>

            <input type="submit" value="Crear Vendedor" class="boton boton-verde-inline-block">
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>