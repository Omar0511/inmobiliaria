<?php
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /');
    }

    require 'include/config/database.php';
    $db = conectarDB();

    $query = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);

    if (!$resultado->num_rows) {
        header('Location: /');
    }

    $propiedad = mysqli_fetch_assoc($resultado);

    /*
        $inicio = false;
        
        include './include/templates/header.php';
    */

    require 'include/funciones.php';

    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1> <?php echo $propiedad['titulo']; ?> </h1>

        <img src="./imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC">
                    <p> <?php echo $propiedad['wc']; ?> </p>
                </li>

                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                    <p> <?php echo $propiedad['estacionamiento']; ?> </p>
                </li>

                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                    <p> <?php echo $propiedad['habitaciones']; ?> </p>
                </li>
            </ul>

            <p> <?php echo $propiedad['descripcion']; ?> </p>
        </div>
    </main>

<?php
    mysqli_close($db);

    incluirTemplates('footer');
    
    //include './include/templates/footer.php';
?>