<?php

    require '../../include/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    $propiedad = new Propiedad;

    estaAutenticado();

    // Mandamos llamar la función que viene de database.php
    $db = conectarDB();

    $propiedad = new Propiedad;

    // Consultar vendedores
    $query = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $query);

    // Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el código después de que el usuario envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Crea una nueva instancia
        $propiedad = new Propiedad($_POST['propiedad']);

        // Generar nombre único de img
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            // Realiza un resize a la imagen con intervention
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);

            // Setear la imagen
            $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validar();

        // Revisar que el array de $errores este vacío
        if ( empty($errores) ) {
            // SUBIDA DE ARCHIVOS, Creamos la carpeta            
            // Validar si una carpeta existe: is_dir();
            if ( !is_dir(CARPETA_IMAGENES) ) {
                // Crear carpeta
                mkdir(CARPETA_IMAGENES);
            }

            // Guardar imagen en el servidor
            $image->save( CARPETA_IMAGENES . $nombreImagen );

            // Guarda en la BD
            $resultado = $propiedad->guardar();

            if ($resultado) {
                header('Location: /admin?resultado=1');
            }
        }

    }

    // Mandamos a llamar la función de incluirTemplates()
    incluirTemplates('header');
?>

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

        <!-- enctype="multipart/form-data": se agrega si queremos subir archivos y/o imagénes -->
        <form action="" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../include/templates/formulario-propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde-inline-block">
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>