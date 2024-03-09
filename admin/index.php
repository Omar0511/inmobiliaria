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

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Casa en la Playa</td>
                    <td>12999</td>
                    <td>
                        <img class="imagen-tabla" src="../imagenes/264210f3c8f9f2a901da1077f813c3dd.jpg" alt="">
                    </td>
                    <td>
                        <a class="boton-rojo-block" href="">Eliminar</a>
                        <a class="boton-amarillo-block" href="">Actualizar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplates('footer');
?>