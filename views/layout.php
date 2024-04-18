<?php
    if ( !isset($_SESSION) ) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if ( !isset($inicio) ) {
        $inicio = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index">
                    <img src="/build/img/logo.svg" alt="Logotipo Bienes Raíces">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono Menú Hamburguesa">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Icono Dark Mode">

                    <nav class="navegacion">
                        <?php
                            if (!$auth) {
                        ?>
                                <a href="/login">Iniciar Sesión</a>
                        <?php 
                            }
                        ?>                        
                        <a href="/nosotros">Nostros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php
                            if ($auth) {
                        ?>
                                <a href="/logout">Cerrar Sesión</a>
                        <?php 
                            }
                        ?>
                    </nav>
                </div>
            </div>

            <?php
                if ( $inicio ) {
            ?>
                    <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php
                }
            ?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nostros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>

        <?php
            $fecha = Date('Y');
        ?>

        <p class="copyright">Todos los derechos reservados <?php echo $fecha; ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>