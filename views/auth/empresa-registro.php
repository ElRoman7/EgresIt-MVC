
<h3 class="titulo-pag">Crear Cuenta Empresarial</h3>
<?php include_once __DIR__ . '/../components/alertas.php'; ?>
<section class="contenedor-formulario">
    <form method="POST" class="formulario" enctype="multipart/form-data">
        <div class="campo">
            <!-- RFC -->
            <label for="RFC">RFC</label>
            <input type="text" name="RFC" id="RFC" placeholder="Tu RFC" value="<?php echo s($empresa->RFC) ?>">
        </div>
        <div class="campo">
            <!-- email -->
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Tu email" value="<?php echo s($empresa->email) ?>">
        </div>
        <div class="campo">
            <!-- contraseña -->
            <label for="contraseña">Contraseña</label>
            <input type="text" name="contraseña" id="contraseña" placeholder="Tu contraseña" value="<?php echo s($empresa->contraseña) ?>">
        </div>
        <div class="campo">
            <!-- nombre -->
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" value="<?php echo s($empresa->nombre) ?>">
        </div>
        <div class="campo">
            <!-- direccion -->
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" placeholder="Tu direccion" value="<?php echo s($empresa->direccion) ?>">
        </div>
        <div class="campo">
            <!-- imagen -->
            <label for="imagen">Logo</label>
            <input type="file" name="imagen" id="imagen" placeholder="Tu Logo" value="<?php echo s($empresa->imagen) ?>">
        </div>
        <input type="submit" class="boton">
    </form>
    <a href="/empresa-login">¿Ya tienes una Cuenta?</a>
</section>