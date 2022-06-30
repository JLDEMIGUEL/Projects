<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php
    if ($mensaje) {
        echo "<p data-cy='alerta-envio' class='alerta exito'>".$mensaje."</p>";
    } ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" loading="lazy" alt="imagen contacto">
    </picture>
    <h2>LLene el formulario de Contacto</h2>
    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" id="nombre" type="text" placeholder="Tu nombre" name="contacto[nombre]" required>
            <label for="mensaje">Mensaje</label>
            <textarea data-cy="input-mensaje" id="mensaje" placeholder="Tu mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>
        <fieldset>
            <legend>Información sobre la Propiedad</legend>
            <label for="opciones">Compra o Vende:</label>
            <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione opción --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>
            <label for="presupuesto">Precio o presupuesto: </label>
            <input data-cy="input-precio" id="presupuesto" type="number" placeholder="Tu presupuesto" name="contacto[precio]" required>
        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input data-cy="forma-contacto" id="contactar-telefono" type="radio" value="telefono" name="contacto[contacto]" required>
                <label for="contactar-correo">Correo</label>
                <input data-cy="forma-contacto" id="contactar-correo" type="radio" value="correo" name="contacto[contacto]" required>
            </div>
            <div id="contacto"></div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>