<h3 class="titulo-pag">Detalles de la Oferta</h3>

<section class="contenedor contenedor-detalles">
    <div class="card card-details">
        <?php foreach ($ofertas as $oferta): ?>
            <div class="card-image"><img src="<?php echo 'imagenes/'. $oferta->imagen ?>" alt="Imagen Empresa"></div>
            <div>
                <div class="category"> <?php echo $oferta->tipo; ?> </div>
                <div class="category"> <?php echo $oferta->nombre; ?> </div>
            </div>
            <div class="heading"> <?php echo $oferta->nombre_oferta ?>
                <p>Detalles De la Oferta</p>
                <p><?php echo $oferta->descripcion; ?></p>
                <div class="buttons">
                    <form method="post">
                        <input type="submit" class="boton" value="Aplicar"></input>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</section>