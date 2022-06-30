<?php

namespace Model;

class Admin extends ActiveRecord{

    protected static $tabla ='usuarios';
    protected static $columnasDB = ['id','email','password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? null;
        $this->email=$args['email'] ?? '';
        $this->password=$args['password'] ?? '';
    }

    public function validar(){

        if(!$this->email){
            self::$errores[]='Debes introducir un email';
        }
        if(!$this->password){
            self::$errores[]='Debes introducir una contraseña';
        }

        return self::$errores;
    }

    public function existeUsuario(){
        $query="SELECT * FROM " . self::$tabla . " WHERE email='" .$this->email. "';";
        $consulta = self::$db->query($query);

        if(!$consulta->num_rows){
            self::$errores[]='El usuario no existe';
            return;
        }
        return $consulta;
    }

    public function comprobarPassword($consulta){
        $usuario=$consulta->fetch_object();

        if(!password_verify($this->password,$usuario->password)){
            self::$errores[]='Contraseña incorrecta';
            return false;
        }
        return true;
    }

    public function autenticar(){
        session_start();

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}