<?php
    require 'include/funciones.php';

    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <form action="" class="formulario">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="mail" name="email" id="email" placeholder="Ingresa tu E-mail">

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Ingresa tu Password">

                <input type="submit" value="Iniciar Sesión" class="boton boton-verde-block">
            </fieldset>
        </form>
    </main>

<?php
    incluirTemplates('footer');
    
    //include './include/templates/footer.php';
?>