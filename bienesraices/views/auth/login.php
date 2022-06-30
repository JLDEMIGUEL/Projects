<main class="contenedor seccion">
    <h1 data-cy="heading-login">Iniciar sesion</h1>
    <?php foreach ($errores as $error) : ?>
        <div data-cy="alerta-login" class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form data-cy="formulario-login" method="POST" class="formulario contenido-centrado" action="/login">
        <fieldset>
            <legend>Correo y password</legend>
            <label for="email">Correo</label>
            <input data-cy="correo" id="email" name="email" type="email" placeholder="Tu correo">
            <label for="password">Password</label>
            <input data-cy="password" id="password" name="password" type="password" placeholder="Tu contraseña">
        </fieldset>
        <input type="submit" value="Iniciar sesión" class="boton boton-verde">
    </form>
</main>