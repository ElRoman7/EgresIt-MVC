<h3 class="titulo-pag">Ofertas</h3>

<section class="contenedor-tarjetas">
<?php foreach ($ofertas as $oferta): ?>
    <a href="/oferta?id=<?php echo $oferta->id;?>" class="card">
        <div class="card-image"><img src="<?php echo 'imagenes/'. $oferta->imagen ?>" alt="Imagen Empresa"></div>
        <div class="category"> <?php echo $oferta->tipo; ?> </div>
        <div class="heading"> <?php echo $oferta->nombre_oferta ?>
            <div class="author"> By <span class="name">Abi</span> 4 days ago</div>
        </div>
    </a>
<?php endforeach; ?>
</section>