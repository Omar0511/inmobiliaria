<?php
    require '../../include/funciones.php';

    incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde-inline-block">Volver</a>

        <form action="" class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" placeholder="Ingresa el Título">

                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" placeholder="Ingresa el precio">

                <label for="imagen">Imagen</label>
                <!-- accept: indica que aceptará, en este caso imagénes con formato jpeg, png -->
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9">

                <label for="wc">Wc</label>
                <input type="number" name="wc" id="precio" placeholder="Ej: 3" min="1" max="9">

                <label for="estacionamiento">Estacionamiento</label>
                <!-- accept: indica que aceptará, en este caso imagénes con formato jpeg, png -->
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <label for="vendedor">Vendedor</label>
                <select name="" id="">
                    <option value="" disabled selected>-- Seleccione una opción --</option>
                    <option value="1">Omar</option>
                    <option value="2">Mimi</option>
                </select>
            </fieldset>
        </form>
    </main>

<?php
    incluirTemplates('footer');
?>