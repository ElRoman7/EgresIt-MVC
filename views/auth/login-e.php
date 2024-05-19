<h3 class="titulo-pag">Log-In</h3>
<?php include_once __DIR__ . '/../components/alertas.php'; ?>

<form class="formulario" method="post">
    <div class="campo">
        <label for="email">Correo</label>
        <input type="email" id="email" name="email" placeholder="Tu Correo"
        value="<?php echo s($auth->email); ?>">
    </div>
    <div class="campo">
        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Tu Contraseña">
    </div>
    <input type="submit" class="boton">
</form>