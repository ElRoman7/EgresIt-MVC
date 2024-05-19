<header class="header">
    <div class="contenedor contenido-header">
        <a class="logo" href="/">
            <img class="logo-header" src="/build/img/Logo.webp" alt="Egres-It">
        </a>
        <div class="barra no-margin">
            <nav class="navegacion">
                <?php if (isAuth()): ?>
                    <?php if (!comprobarTipoDeUsuario('Empresa')): ?>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/ofertas">Ofertas</a>
                    <?php endif ?>
                        <a href="/logout">Logout</a>
                    <?php if (comprobarTipoDeUsuario('Empresa')): ?>
                        <!-- <a href="/oferta">Oferta</a> -->
                    <?php endif; ?>
                    <?php else: ?>
                        <a href="/login">Login</a>
                <?php endif ?>
                
            </nav>
        </div> <!-- /Barra -->
    </div>
</header>