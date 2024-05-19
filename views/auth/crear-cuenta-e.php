<h3 class="titulo-pag">Crear Cuenta</h3>
<?php include_once __DIR__ . '/../components/alertas.php'; ?>

<form class="formulario formulario-crear-e" method="post">
    <div class="campo">
    <label for="codigo_estudiante">Código de Estudiante</label>
    <input type="number" id="codigo_estudiante" name="codigo_estudiante" placeholder="Tu código de estudiante" 
       value="<?php echo s($estudiante->codigo_estudiante); ?>">

    </div>
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre"
        value="<?php echo s($estudiante->nombre); ?>">
    </div>
    <div class="campo">
        <label for="email">Correo</label>
        <input type="email" id="email" name="email" placeholder="Tu Correo"
        value="<?php echo s($estudiante->email); ?>">
    </div>
    <div class="campo">
        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Tu Contraseña">
    </div>
    <div class="campo">
        <label for="carrera">Carrera</label>
        <select name="carrera" id="carrera">
            <option value="0">--Seleciona Una Carrera--</option>
            <option value="Ingenieria Informatica">Ingeniería Informática</option>
        </select>
    </div>
    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="tel" placeholder="Tu número de teléfono" name="telefono" id="telefono"
        value="<?php echo s($estudiante->telefono); ?>">
    </div>
    
    <div class="campo">
        <label for="nivel_estudios">Semestre</label>
        <select name="nivel_estudios" id="nivel_estudios">
            <option value="0">--Selecciona una opción--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="Finalizada">Carrera Finalizada</option>
        </select>
    </div>
    <div class="campo">
        <label for="cv_pdf_path">Currículum</label>
        <input type="file" id="cv_pdf_path" name="cv_pdf_path" placeholder="Tu Currículum"
        value="<?php echo s($estudiante->cv_pdf_path); ?>">
    </div>
    <div class="campo">
        <label for="foto_path">Foto</label>
        <input type="file" id="foto_path" name="foto_path" placeholder="Tu foto"
        value="<?php echo s($estudiante->foto_path); ?>">
    </div>

    <input class="boton botonForm" type="submit" value="Registrarte">

</form>