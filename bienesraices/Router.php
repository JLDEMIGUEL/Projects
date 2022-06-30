<?php

namespace MVC;

class Router{

    public $rutasGET=[];
    public $rutasPOST=[];

    public function get($url, $fn){
        $this->rutasGET[$url]=$fn;
    }
    public function post($url, $fn){
        $this->rutasPOST[$url]=$fn;
    }

    public function comprobarRutas()
    {

        session_start();

        $auth=$_SESSION['login']  ?? null;

        $rutasPrivadas=['/admin','/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar',
        '/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo==='GET'){
            $fn=$this->rutasGET[$urlActual]??null;
        } else if($metodo==='POST'){
            $fn=$this->rutasPOST[$urlActual]??null;
        }

        if(in_array($urlActual,$rutasPrivadas) && !$auth){
            header('Location: /login');
        }

        if($fn){
            call_user_func($fn,$this);
        }else{
            echo "Pagina no encontrada";
        }
    }

    //Muestra vista
    public function render($view,$datos = []){

        foreach($datos as $key=>$value){
            $$key=$value;
        }
        ob_start();//Empezar a guardar datos en memoria
        include __DIR__."/views/$view.php";

        $contenido=ob_get_clean();//Limpiar memoria

        include __DIR__."/views/layout.php";
    }
}