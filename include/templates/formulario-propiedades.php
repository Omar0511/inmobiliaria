<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" placeholder="Ingresa el Título" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" name="precio" id="precio" placeholder="Ingresa el precio" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <!-- accept: indica que aceptará, en este caso imagénes con formato jpeg, png -->
    <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png" >

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" id="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones); ?>">

    <label for="wc">Wc</label>
    <input type="number" name="wc" id="precio" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamiento</label>
    <!-- accept: indica que aceptará, en este caso imagénes con formato jpeg, png -->
    <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor_id">Vendedor</label>
    <select id="vendedor_id" name="vendedor_id">
        <option value="" disabled selected>-- Seleccione una opción --</option>
        <?php 
            while($row = mysqli_fetch_assoc($resultado) ): 
        ?>
                <option 
                    <?php echo $vendedor_id === $row['id'] ? 'selected' : ''; ?>  
                    value="<?php echo s( $propiedades->row['id'] ); ?>"
                >
                    <?php echo $row['nombre'] . " " . $row['apellido']; ?>
                </option>
        <?php 
            endwhile; 
        ?>
    </select>
</fieldset>