<h1 class="titulo-pag"><?php echo $titulo; ?></h1>
<?php include_once __DIR__ . '/../components/alertas.php'; ?>


<form method="post" class="formulario">
    <!-- nombre_oferta -->
    <div class="campo">
        <label for="nombre_oferta">Nombre</label>
        <input type="text" id="nombre_oferta" name="nombre_oferta" placeholder="Nombre de la Oferta">
    </div>
    <!-- descripcion -->
    <div class="campo">
        <label for="descripcion">Descripcion</label>
        <input type="text" id="descripcion" name="descripcion" placeholder="Descripción de la oferta">
    </div>
    <div class="campo">
        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo">
            <option value="0" disabled>--Selecciona una opción--</option>
            <option value="Trabajo" >Trabajo</option>
            <option value="Practicas" >Prácticas</option>
        </select>
    </div>
    <input type="submit" class="boton">
</form>