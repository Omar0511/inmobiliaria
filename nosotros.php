<?php
    require 'include/app.php';

    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h2>Conoce Sobre Nosotros</h2>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source src="build/img/nosotros.webp" type="image/webp">
                    <source src="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>
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
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit error non iusto illo exercitationem incidunt asperiores? Ipsa molestiae saepe animi, deleniti quod perspiciatis cum reprehenderit iure nam modi, adipisci quasi!
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit error non iusto illo exercitationem incidunt asperiores? Ipsa molestiae saepe animi, deleniti quod perspiciatis cum reprehenderit iure nam modi, adipisci quasi!
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit error non iusto illo exercitationem incidunt asperiores? Ipsa molestiae saepe animi, deleniti quod perspiciatis cum reprehenderit iure nam modi, adipisci quasi!
                </p>
            </div>
        </div>
    </section>

<?php
    incluirTemplates('footer');

    //include './include/templates/footer.php';
?>