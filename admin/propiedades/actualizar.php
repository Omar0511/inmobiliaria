<?php
    // require '../../include/funciones.php';
    // $auth = estaAutenticado();

    // if (!$auth) {
    //     header('Location: /login.php');
    // }

    use App\Propiedad;

    require '../../include/app.php';
    estaAutenticado();
    
    // Validamos que el ID sea un ENTERO
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }

    // Consultar Porpiedades por ID
    // $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    // $resultado = mysqli_query($db, $consulta);
    // $propiedad = mysqli_fetch_assoc($resultado);
    $propiedad = Propiedad::find($id);

    // Consultar vendedores
    $query = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $query);

    // Arreglo con mensaje de errores
    $errores = [];

    // Ejecutar el código después de que el usuario envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        /*
            Mostrando lo que manda el FORM
            echo '<pre>';
                var_dump($_POST);
            echo '</pre>';
        */

        // Sanitizando y/o Evitando INYECTION SQL
        $titulo = mysqli_real_escape_string($db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string($db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string($db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento'] );
        // $vendedor_id = mysqli_real_escape_string($db, $_POST['vendedor_id'] );
        
        // Asignar vendedor_id si está definido en $_POST, de lo contrario, asignar un valor predeterminado (por ejemplo, '')
        $vendedor_id = isset($_POST['vendedor_id']) ? mysqli_real_escape_string($db, $_POST['vendedor_id']) : '';

        $creado = date('Y/m/d');

        // Asignar FILES hacia una variable
        $imagen = $_FILES['imagen'];

        if (!$titulo) {
            $errores[] = "El Título es obligatorio";
        }

        if (!$precio) {
            $errores[] = "El Precio es obligatorio";
        }

        if ( strlen( $descripcion) < 50 ) {
            $errores[] = "La Descripción debe tener minímo 50 carácteres...";
        }

        if (!$habitaciones) {
            $errores[] = "Las Habitaciones son obligatorias";
        }

        if (!$wc) {
            $errores[] = "El WC es obligatorio";
        }

        if (!$estacionamiento) {
            $errores[] = "El Estacionamiento es obligatorio";
        }

        if (!$vendedor_id) {
            $errores[] = "El Vendedor es obligatorio";
        }

        // Convertir de Bytes a KyloBytes, validar por tamaño (100 kb máximo)
        $medida = 1000 * 1000;

        if ($imagen['size'] > $medida) {
            $errores[] = 'La Imagen es muy pesada';
        }

        // Revisar que el array de $errores este vacío
        if ( empty($errores) ) {
            // SUBIDA DE ARCHIVOS
            $carpetaImagenes = '../../imagenes/';

            // Validar si una carpeta existe: is_dir();
            if ( !is_dir($carpetaImagenes) ) {
                // Crear carpeta
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            // unlink() = Elimina Archivos
            if ( $imagen['name'] ) {
                unlink($carpetaImagenes . $propiedad['imagen']);

                // Generar nombre único de img
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );

            } else {
                $nombreImagen = $propiedad['imagen'];
            }

            // INSERT a la BD
            $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedor_id = ${vendedor_id} WHERE id = ${id}
            ";

            // Probar query: echo $query;
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('Location: /admin?resultado=2');
            }
        }

    }

    // Mandamos a llamar la función de incluirTemplates()
    incluirTemplates('header');
?>

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
            <?php require '../../include/templates/formulario-propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde-inline-block">
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>