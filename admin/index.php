<?php
    $resultado = $_GET['resultado'] ?? null;

    require '../include/funciones.php';

    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador</h1>

        <?php 
            // intval() = convierte un STRING a ENTERO
            if ( intval( $resultado ) === 1) {            
        ?>
            <p class="alerta exito">Anuncio creado correctamente</p>
        <?php 
            }
        ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde-inline-block">Nueva Propiedad</a>
    </main>

<?php
    incluirTemplates('footer');
?>