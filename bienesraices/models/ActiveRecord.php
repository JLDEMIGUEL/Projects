<?php

namespace Model;

class ActiveRecord{

    //Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla ='';

    protected static $errores = [];




    public static function setDB($database)
    {
        self::$db = $database;
    }



    public function guardar()
    {
        if (isset($this->id)) {
            //Actualizar
            $this->actualizar();
        } else {
            //Crear
            $this->crear();
        }
    }

    public function actualizar()
    {
        $atributos = $this->sanitize();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "${key} = '${value}'";
        }

        $query = "UPDATE ".static::$tabla." SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "'; ";
        $resultado = self::$db->query($query);
        if ($resultado) {
            //Redireccionar usuario
            header('Location: /admin?codigo=2');
        }
    }

    public function crear()
    {
        //sanitizar datos
        $atributos = $this->sanitize();

        $query = "INSERT INTO ".static::$tabla." (";
        $query .= join(',', array_keys($atributos));
        $query .= " ) VALUES ( '";
        $query .= join("','", array_values($atributos));
        $query .= " ')";
        $resultado = self::$db->query($query);
        if ($resultado) {
            //Redireccionar usuario
            header('Location: /admin?codigo=1');
        }
    }

    public function eliminar()
    {
        //Eliminar registro
        $query = "DELETE FROM ".static::$tabla." WHERE id= " . self::$db->escape_string($this->id);;
        
        if (static::$db->query($query)) {
            $this->borrarImagen();
            header('Location: /admin?codigo=3');
        }
    }

    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === "id") continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitize()
    {
        $atributos = $this->atributos();
        $sanitized = [];
        foreach ($atributos as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }

        return $sanitized;
    }

    //Subida de archivos
    public function setImagen($imagen)
    {
        //Eliminar imagen antigua
        if (!is_null($this->id)) { //Si estamos actualizando y no creando (aun no tiene id)
            $this->borrarImagen();
        }
        //Asignar nombre imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }
    //Borrar imagen
    public function borrarImagen()
    {
        if (file_exists(CARPETA_IMAGENES . $this->imagen)) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    //Validacion
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores=[];
        return static::$errores;
    }

    //Listar todos los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;//static para usar el del hijo y no el de self
        $consulta = self::consultaSQL($query);
        return $consulta;
    }
    //Obtener numero determinado de registros
    public static function get($limit)
    {
        $query = "SELECT * FROM " . static::$tabla." LIMIT ".$limit.";";//static para usar el del hijo y no el de self
        $consulta = self::consultaSQL($query);
        return $consulta;
    }

    //Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM ".static::$tabla." WHERE id =${id}";
        $consulta = self::consultaSQL($query);
        return $consulta[0];
    }

    //Consulta
    public static function consultaSQL($query)
    {
        //Consulta
        $consulta = self::$db->query($query);

        //Crear array de objetos
        $array = [];
        while ($res = $consulta->fetch_assoc()) {
            $array[] = static::crearObjeto($res);
        }

        //Liberar memoria
        $consulta->free();

        //Retornar resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        // $objeto= new self; 
        // foreach($registro as $key=>$value){
        //     if(property_exists($objeto,$key)){
        //         $objeto->$key=$value;
        //     }
        // }
        // debug($objeto);

        return new static($registro);
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
