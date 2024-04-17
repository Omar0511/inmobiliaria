<main class="contenedor seccion">
    <h1>Contacto</h1>

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
            <input type="text" name="contacto[nombre]" id="nombre" placeholder="Ingresa tu Nombre" required>

            <label for="email">E-mail</label>
            <input type="email" name="contacto[email]" id="email" placeholder="Ingresa tu E-mail" required>

            <label for="telefono">Teléfono</label>
            <input type="tel" name="contacto[telefono]" id="telefono" placeholder="Ingresa tu Teléfono">

            <label for="mensaje">Mensaje</label>
            <textarea name="contacto[mensaje]" id="mensaje" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la Propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select name="contacto[tipo]" id="opciones" required>
                <option value="" disabled selected>-- Seleccione una opción --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" name="contacto[precio]" id="presupuesto" placeholder="Ingresa tu Precio o Presupuesto" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>¿Como desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" id="contactar-telefono" value="telefono" required>
                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto[contacto]" id="contactar-telefono" value="email" required>
            </div>
            
            <p>Si eligió teléfono, elija la fecha y la hora</p>

            <label for="fecha">Fecha</label>
            <input type="date" name="contacto[fecha]" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" name="contacto[hora]" id="hora" min="09:00" max="18:00">
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde-inline-block">
    </form>
</main>