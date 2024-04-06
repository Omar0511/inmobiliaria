<?php
    require '../include/app.php';
    
    estaAutenticado();
    
    use App\Propiedad;
    use App\Vendedor;

    // Implementar método para obtener las propiedades
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        $id = $_POST['id'];
        $id = filter_var( $id, FILTER_VALIDATE_INT);

        if ($id) {
            $tipo = $_POST['tipo'];

            if ( validarTipoContenido($tipo) ) {

                if ($tipo === 'vendedor') {
                    $vendedor = Vendedor::find($id);

                    $vendedor->eliminar();
                } else if ($tipo === 'propiedad') {
                    $propiedad = Propiedad::find($id);

                    $propiedad->eliminar();
                }

            }
        }
        
    }

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
            } else if ( intval( $resultado ) === 2) {
        ?>
                <p class="alerta exito">Anuncio actualizado correctamente</p>
        <?php
            } else if ( intval( $resultado ) === 3) {
        ?>
                <p class="alerta exito">Anuncio eliminado correctamente</p>
        <?php
            }
        ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde-inline-block">Nueva Propiedad</a>

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

                            <a class="boton-amarillo-block" href="/admin/vemdedores/actualizar.php?id=<?php echo $vendedor->id;?>">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplates('footer');
?>