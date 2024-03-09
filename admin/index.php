<?php
    // Importar la conexión
    require '../include/config/database.php';
    $db = conectarDB();

    // Escribir Query
    $query = "SELECT * FROM propiedades";

    // Consultar la BD
    $resultadoPropiedades = mysqli_query($db, $query);

    // Muestra mensaje condicional
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
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <!-- Mostrar los resultados de la BD -->
            <tbody>
                <?php while( $propiedad = mysqli_fetch_assoc($resultadoPropiedades)): ?>
                    <tr>
                        <td> <?php echo $propiedad['id']; ?> </td>
                        <td> <?php echo $propiedad['titulo']; ?> </td>                        
                        <td>
                            <img class="imagen-tabla" src="../imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de Casa">
                        </td>
                        <td> $<?php echo $propiedad['precio']; ?> </td>
                        <td>
                            <a class="boton-rojo-block" href="">Eliminar</a>
                            <a class="boton-amarillo-block" href="">Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php
    // Cerrar conexión a la BD
    mysqli_close($db);

    incluirTemplates('footer');
?>