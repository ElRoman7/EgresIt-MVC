
<h3 class="titulo-pag">Login Empresa</h3>

<?php include_once __DIR__ . '/../components/alertas.php'; ?>

<section class="contenedor-formulario">
    <form class="formulario" method="post">
        <div class="campo">
            <!-- email -->
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Tu email" value="<?php echo s($auth->email) ?>">
        </div>
        <div class="campo">
            <!-- contraseña -->
            <label for="contraseña">Contraseña</label>
            <input type="text" name="contraseña" id="contraseña" placeholder="Tu contraseña" value="<?php echo s($auth->contraseña) ?>">
        </div>
        <input type="submit" class="boton" value="Ingresar">
    </form>
    <a href="/empresa-registro">¿No tienes una Cuenta?</a>
</section>
