<h3 class="titulo-pag">Empresa</h3>

<a href="oferta-crear" class="boton">Nueva Oferta</a>

<!-- Mostrar Ofertas -->
<section class="contenedor">
    <table class="ofertas-tabla">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Id Empresa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ofertas as $oferta): ?>
            <tr>
                <td><?php echo $oferta->id ?></td>
                <td><?php echo $oferta->nombre_oferta ?></td>
                <td><?php echo $oferta->descripcion ?></td>
                <td><?php echo $oferta->id_empresa ?></td>
                <td>
                    <a href="/oferta-eliminar" class="boton">Eliminar</a>
                    <a href="/aplicaciones?id=<?php echo $oferta->id;?>" class="boton">Aplicaciones</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>



