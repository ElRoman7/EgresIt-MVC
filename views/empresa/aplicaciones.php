<h3 class="titulo-pag">Aplicaciones de Estudiantes</h3>
<section class="contenedor">
    <table class="aplicaciones-tabla">
        <thead>
            <tr>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Carrera</th>  
                <th>Semestre</th>  
            </tr>
        </thead>
        <tbody>
            <?php foreach($estudiantes as $estudiante): ?>
            <tr>
                <td><?php echo $estudiante->email ?></td>
                <td><?php echo $estudiante->telefono ?></td>
                <td><?php echo $estudiante->carrera ?></td>
                <td><?php echo $estudiante->nivel_estudios ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
