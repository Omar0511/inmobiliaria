<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde-inline-block">Volver</a>

    <?php
        foreach($errores as $e) {
    ?>
        <div class="alerta error"> <?php echo $e; ?> </div>
    <?php
        }
    ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde-inline-block">
    </form>
</main>