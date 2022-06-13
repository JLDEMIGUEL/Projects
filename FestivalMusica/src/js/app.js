document.addEventListener('DOMContentLoaded',()=>iniciarApp());

function iniciarApp(){
    crearGaleria();
    
    scrollNav();
    navegacionFija();
}

function navegacionFija(){
    const navegacion=document.querySelector('.header');
    const sobreFestival=document.querySelector('.sobre-festival');
    const body=document.querySelector('body')

    window.addEventListener('scroll',function(){
        if(sobreFestival.getBoundingClientRect().bottom<0){//Si el elemento ya ha sido pasado
            navegacion.classList.add('fijo');
            body.classList.add('body-scroll');
        }else{
            navegacion.classList.remove('fijo');
            body.classList.remove('body-scroll');
        }
    })
}

function scrollNav(){
    const enlaces = document.querySelectorAll('.navegacion-principal a');
    enlaces.forEach(enlace => {
        enlace.addEventListener('click',function(e){
            e.preventDefault();

            const seccion = document.querySelector(e.target.attributes.href.value);
            seccion.scrollIntoView({ behavior: "smooth"});
        })
    });
}

function crearGaleria(){
    const galeria = document.querySelector('.galeria-imagenes');

    for(let i=1;i<=12;i++){
        const imagen = document.createElement('picture');
        imagen.innerHTML=`<source srcset="build/img/thumb/${i}.avif" type="image/avif">
        <source srcset="build/img/thumb/${i}.webp" type="image/webp">
        <img loading="lazy" width="200" height="300" src="build/img/thumb/${i}.jpg" alt="imagen galeria">`;

        imagen.onclick = function(){
            mostrarImagen(i);
        }
        galeria.appendChild(imagen);
    }
}

function mostrarImagen(i){
    const imagen = document.createElement('picture');
    imagen.innerHTML=`<source srcset="build/img/grande/${i}.avif" type="image/avif">
    <source srcset="build/img/grande/${i}.webp" type="image/webp">
    <img loading="lazy" width="200" height="300" src="build/img/grande/${i}.jpg" alt="imagen galeria">`;
    
    //Crea overlay con la imagen
    const overlay = document.createElement('DIV');
    overlay.appendChild(imagen);
    overlay.classList.add('overlay');
    overlay.onclick=function(){
        overlay.remove(); 
        const body = document.querySelector('body');
        body.classList.remove('fijar-body');
    }

    //Boton para cerrar ventana
    const cerrarVentana = document.createElement('P');
    cerrarVentana.textContent='X';
    cerrarVentana.classList.add('btn-cerrar');
    cerrarVentana.onclick=function(){
        overlay.remove(); 
        const body = document.querySelector('body');
        body.classList.remove('fijar-body');  
    }
    overlay.appendChild(cerrarVentana);

    //Añade overlay al html
    const body = document.querySelector('body');
    body.appendChild(overlay);
    body.classList.add('fijar-body')


}


