<?php
    /*
        $inicio = false;
        
        include './include/templates/header.php';
    */

    require 'include/funciones.php';

    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casan en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC">
                    <p>3</p>
                </li>

                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                    <p>3</p>
                </li>

                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                    <p>4</p>
                </li>
            </ul>

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