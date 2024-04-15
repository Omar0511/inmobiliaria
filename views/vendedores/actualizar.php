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