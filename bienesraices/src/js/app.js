document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode();
});

function darkMode(){

    const preferencia=window.matchMedia('(prefers-color-scheme: dark)');

    //console.log(preferencia.matches);

    if(preferencia.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode'); 
    }

    preferencia.addEventListener('change',function(){
        if(preferencia.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode'); 
        }
    })

    const darkModeBtn= document.querySelector('.dark-mode-boton');
    darkModeBtn.addEventListener('click',function(){
        document.body.classList.toggle('dark-mode');
    })
}

function eventListeners(){

    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click',navegacionResponsive);

    //Formulario contacto responsive
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click',mostrarMetodoContacto));
}

function navegacionResponsive(){
    const navegacion=document.querySelector('.navegacion');

    //navegacion.classList.toggle('mostrar');
    if(navegacion.classList.contains('mostrar')){
            navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }
}

function mostrarMetodoContacto(e){
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
        <label for="telefono">Teléfono</label>
        <input data-cy="input-telefono" id="telefono" type="tel" placeholder="Tu teléfono" name="contacto[telefono]">
        <p>Elija fecha y hora</p>
        <label for="fecha">Fecha:</label>
        <input data-cy="input-fecha" id="fecha" type="date" name="contacto[fecha]">
        <label for="hora">Hora:</label>
        <input data-cy="input-hora" id="hora" type="time" min="09:00" max="21:00" name="contacto[hora]">
        `;
    }else if(e.target.value === 'correo'){
        contactoDiv.innerHTML = `
        <label for="email">Correo</label>
        <input data-cy="input-correo" id="email" type="email" placeholder="Tu correo" name="contacto[correo]" required>
        `;
    }



}
