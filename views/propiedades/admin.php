<main class="contenedor seccion">
    <h1>Administrador</h1>

    <?php
        if ($resultado) {
            // intval(): convierte una cadena STRING a ENTERO int
            $mensaje = mostrarNotificacion( intval( $resultado) ); 

            if ($mensaje) {
    ?>
                <p class="alerta exito"> <?php echo s($mensaje); ?> </p>
    <?php
            }
        }
    ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde-inline-block">Nueva Propiedad</a>
    <a href="/admin/vendedores/crear.php" class="boton boton-amarillo-inline-block">Nuevo Vendedor</a>

    <h2>Propiedades</h2>
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
            <!-- foreach: es usado especialmente para recorrer arreglos -->
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?> </td>
                    <td> <?php echo $propiedad->titulo; ?> </td> 

                    <td>
                        <img class="imagen-tabla" src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de Casa">
                    </td>

                    <td> $<?php echo $propiedad->precio; ?> </td>

                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" id="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" id="tipo" value="propiedad">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id;?>">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- Mostrar los resultados de la BD -->
        <tbody>
            <!-- foreach: es usado especialmente para recorrer arreglos -->
            <?php foreach ($vendedores as $vendedor) : ?>
                <tr>
                    <td> <?php echo $vendedor->id; ?> </td>
                    <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                    <td> <?php echo $vendedor->telefono; ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" id="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" id="tipo" value="vendedor">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a class="boton-amarillo-block" href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id;?>">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>