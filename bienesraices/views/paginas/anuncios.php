<div class="contenedor-anuncios" data-cy="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) : ?>
        <div class="anuncio" data-cy="anuncio">
            <img class="imagen-anuncio" loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p>Vendedor: <?php echo vendedorById($vendedores, $propiedad->vendedorId); ?></p>
                <p class="precio"><?php echo $propiedad->precio; ?>€</p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                </ul>

                <a data-cy="enlace-propiedad" href="propiedad?id=<?php echo $propiedad->id; ?>" class="boton boton-amarillo">Ver Propiedad</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>