<fieldset>
    <legend>Información del Vendedor</legend>

    <label for="nombre">Nombre</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Ingresa el Nombre del Vendedor" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Ingresa el Apellido del Vendedor" value="<?php echo s($vendedor->apellido); ?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Teléfono</label>
    <input type="number" name="vendedor[telefono]" id="telefono" placeholder="Ingresa el Teléfono del Vendedor" value="<?php echo s($vendedor->telefono); ?>">
</fieldset>