<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if ($mensaje) : ?>
            <p class="alerta exito"> <?php echo $mensaje; ?> </p>
    <?php endif; ?>
    
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.webp" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form action="/contacto" class="formulario" method="POST">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" name="contacto[nombre]" id="nombre" placeholder="Ingresa tu Nombre" >

            <label for="mensaje">Mensaje</label>
            <textarea name="contacto[mensaje]" id="mensaje" ></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la Propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select name="contacto[tipo]" id="opciones" >
                <option value="" disabled selected>-- Seleccione una opción --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" name="contacto[precio]" id="presupuesto" placeholder="Ingresa tu Precio o Presupuesto" >
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>¿Como desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" id="contactar-telefono" value="telefono" >
                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto[contacto]" id="contactar-telefono" value="email" >
            </div>

            <div id="contacto"></div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde-inline-block">
    </form>
</main>