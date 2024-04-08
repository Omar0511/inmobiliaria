<?php

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    require '../../include/app.php';

    estaAutenticado();
    
    // Validamos que el ID sea un ENTERO
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }

    // Consultar Porpiedades por ID
    $propiedad = Propiedad::find($id);
    $vendedores = Vendedor::all();

    // Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el código después de que el usuario envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //debuguear($propiedad);

        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);
        
        $errores = $propiedad->validar();

        // Generar nombre único de img
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        // Subida de archivos
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            // Realiza un resize a la imagen con intervention
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);            
            // Setear la imagen
            $propiedad->setImagen($nombreImagen);
        }

        // Revisar que el array de $errores este vacío
        if ( empty($errores) ) {
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }            

            $propiedad->guardar();
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