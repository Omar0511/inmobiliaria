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
    
    <form action="/vendedores/crear" class="formulario" method="POST">
        <?php include 'formulario.php'; ?>

        <input type="submit" value="Crear Vendedor" class="boton boton-verde-inline-block">
    </form>
</main>