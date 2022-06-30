<main class="contenedor seccion">
    <h2 data-cy="heading-nosotros">Sobre nosotros</h1>
    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2 data-cy="heading-anuncios">Casas y Apartamentos en Venta</h2>

    <?php include 'anuncios.php';?>
    
    <div class="alinear-derecha">
        <a data-cy="ver-propiedades" href="propiedades" class="boton-verde">Ver todas</a>
    </div>
</section>

<section data-cy="imagen-contacto" class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Rellena el formulario de contacto y un asesor se pondrá en contacto con usted lo antes posible</p>
    <a href="contacto" class="boton-amarillo-inline">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section data-cy="blog" class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="foto blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>16/06/2022</span> por: <span>Admin</span></p>
                    <p>
                        Consejos para construir una terraza en el techo de
                        tu casa con los mejores materiales y ahorrando dinero
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="foto blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p>Escrito el: <span>16/06/2022</span> por: <span>Admin</span></p>
                    <p>
                        Maximiza el espacio de tu hogar con esta guía, aprende a combinar
                        muebles y colores para darle vida a tu espacio.
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section data-cy="comentarios" class="comentarios">
        <h3>Comentarios</h3>
        <div class="comentarios">
            <blockquote>
                El personal se comportó de forma excelente, muy buena atención y la casa
                que me ofrecieron cumple con mis expectativas.
            </blockquote>
            <p>- Jose De Miguel -</p>
        </div>
    </section>
</div>