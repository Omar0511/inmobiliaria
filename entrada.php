<?php
    /*
        $inicio = false;
        
        include './include/templates/header.php';
    */
    require 'include/funciones.php';

    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu Hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </>

        <div class="resumen-propiedad">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus quaerat, in rem tempora maiores iure veritatis vero eius dolorem? Vero dignissimos optio eum alias numquam odio distinctio architecto porro explicabo.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus quaerat, in rem tempora maiores iure veritatis vero eius dolorem? Vero dignissimos optio eum alias numquam odio distinctio architecto porro explicabo.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus quaerat, in rem tempora maiores iure veritatis vero eius dolorem? Vero dignissimos optio eum alias numquam odio distinctio architecto porro explicabo.
            </p>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus quaerat, in rem tempora maiores iure veritatis vero eius dolorem? Vero dignissimos optio eum alias numquam odio distinctio architecto porro explicabo.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus quaerat, in rem tempora maiores iure veritatis vero eius dolorem? Vero dignissimos optio eum alias numquam odio distinctio architecto porro explicabo.
            </p>
        </div>
    </main>

<?php
    incluirTemplates('footer');

    //include './include/templates/footer.php';
?>