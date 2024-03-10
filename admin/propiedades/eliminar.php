<?php
    // session_start();

    // $auth = $_SESSION['login'];

    // if (!$auth) {
    //     header('Location: /login.php');
    // }
    
    require '../../include/funciones.php';
    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: /login.php');
    }


    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Eliminar</h1>
    </main>

<?php
    incluirTemplates('footer');
?>