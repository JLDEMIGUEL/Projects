<?php

define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function estaAutenticado()
{
    session_start();
    if (!$_SESSION['login']) {
        header('Location: /login.php');
    }
}

function debug($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}

//Sanitiar html
function s($html): string
{
    return htmlspecialchars($html);
}

//Validar tipo contenido
function validarTipoContenid($tipo)
{
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

//Mostrar mensajes del crud
function mostrarNotificacion($cod)
{
    $mensaje = [];
    switch ($cod) {
        case 1:
            $mensaje = "Creado correctamente";
            break;
        case 2:
            $mensaje = "Actualizado correctamente";
            break;
        case 3:
            $mensaje = "Eliminado correctamente";
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function validarORedireccionar(string $url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
    }
    return $id;
}


function vendedorById($vendedores, $id){
    foreach($vendedores as $vendedor){
        if($vendedor->id===$id){
            return $vendedor->nombre. " " .$vendedor->apellido;
        }
    }
}