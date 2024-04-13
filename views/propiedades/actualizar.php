<main class="contenedor seccion">
    <h1>Actualizar</h1>

    <a href="/admin" class="boton boton-verde-inline-block">Volver</a>

    <?php
        foreach($errores as $e) {
    ?>
        <div class="alerta error"> <?php echo $e; ?> </div>
    <?php
        }
    ?>

    <!-- enctype="multipart/form-data": se agrega si queremos subir archivos y/o imagénes -->
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde-inline-block">
    </form>
</main>