<?php
    require 'include/app.php';

    incluirTemplates('header');
?>
    <main class="contenedor seccion">
        <h2>Casas y Depas en Venta</h2>

        <?php
            $limite = 10;
            include 'include/templates/anuncios.php'; 
        ?>
        
    </main>

<?php
    incluirTemplates('footer');
    
    //include './include/templates/footer.php';
?>