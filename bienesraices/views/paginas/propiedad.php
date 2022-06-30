<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="titulo-propiedad"><?php echo $propiedad->titulo;?></h1>
    <img src="/imagenes/<?php echo $propiedad->imagen;?>" loading="lazy" alt="imagen anuncio">
    <div class="resumen-propiedad">
        <p class="precio"><?php echo $propiedad->precio;?>€</p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono">
                <p><?php echo $propiedad->wc;?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono">
                <p><?php echo $propiedad->estacionamiento;?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono">
                <p><?php echo $propiedad->habitaciones;?></p>
            </li>
        </ul>
        <p>Vendedor: <?php echo $vendedor->nombre." ".$vendedor->apellido;?></p>
        <p><?php echo $propiedad->descripcion;?></p>
    </div>
</main>