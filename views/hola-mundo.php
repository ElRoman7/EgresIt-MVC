<section class="contenedor bienvenida">
    <h2>Bienvenido a Egres It</h2>
    <p>Descubre oportunidades emocionantes y relevantes para iniciar tu carrera o encontrar prácticas profesionales. Conéctate con empresas líderes y accede a recursos útiles para destacar en tu búsqueda de empleo.</p>
    <?php if(!isAuth()): ?>
    <p>¡Regístrate hoy mismo y comienza tu viaje hacia el éxito profesional con nosotros!</p>

    <a href="registro" class="boton">Registrate Aquí</a>
    <?php endif; ?>
</section>

<section class="contenedor ofertas-destacadas">
    <h3>Ofertas Destacadas</h3>
    <section class="contenedor-tarjetas">
    <?php
$counter = 0;
foreach ($ofertas as $oferta):
    if ($counter >= 4) break;
    $counter++;
?>
    <a href="/oferta?id=<?php echo $oferta->id;?>" class="card">
        <div class="card-image"><img src="<?php echo 'imagenes/'. $oferta->imagen ?>" alt="Imagen Empresa"></div>
        <div class="category"> <?php echo $oferta->tipo; ?> </div>
        <div class="heading"> <?php echo $oferta->nombre_oferta ?>
            <div class="author"> By <span class="name">Abi</span> 4 days ago</div>
        </div>
    </a>
<?php endforeach; ?>
    </section>
    <a class="boton" href="/ofertas">Ver más</a>
</section>