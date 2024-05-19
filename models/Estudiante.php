<?php

namespace Model;

class Estudiante extends ActiveRecord{
    protected static $tabla = 'estudiantes';
    protected static $columnasDB = [
                                    'id',
                                    'codigo_estudiante',
                                    'nombre',
                                    'email',
                                    'carrera',
                                    'telefono',
                                    'nivel_estudios',
                                    'cv_pdf_path',
                                    'foto_path',
                                    'contraseña'];
    
    public $id;
    public $codigo_estudiante;
    public $nombre;
    public $email;
    public $carrera;
    public $telefono;
    public $nivel_estudios;
    public $cv_pdf_path;
    public $foto_path;
    public $contraseña;

    public function __construct($args = [])
    {
        $this->id =                 $args['id'] ?? null;
        $this->codigo_estudiante =  $args['codigo_estudiante'] ?? null;
        $this->nombre =             $args['nombre'] ?? '';
        $this->email =              $args['email'] ?? '';
        $this->carrera =            $args['carrera'] ?? '';
        $this->telefono =           $args['telefono'] ?? '';
        $this->nivel_estudios =     $args['nivel_estudios'] ?? '';
        $this->cv_pdf_path =        $args['cv_pdf_path'] ?? 'abc';
        $this->foto_path =          $args['foto_path'] ?? 'abc';
        $this->contraseña =         $args['contraseña'] ?? '';
    }

    public function validarNuevaCuenta(){
        if(!$this->codigo_estudiante){
            self::$alertas['error'][]= 'El código de estudiante es Obligatorio';
        }
        
        if(!$this->nombre){
            self::$alertas['error'][]= 'El nombre es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][]= 'El email es Obligatorio';
        }
        if(!$this->carrera){
            self::$alertas['error'][]= 'La selección de carrera es Obligatoria';
        }
        if(!$this->telefono){
            self::$alertas['error'][]= 'El teléfono es Obligatorio';
        }
        if(!$this->nivel_estudios){
            self::$alertas['error'][]= 'El nivel de estudios es Obligatorio';
        }
        if(!$this->contraseña){
            self::$alertas['error'][]= 'La contraseña es Obligatoria';
        }else if(strlen($this->contraseña) < 8){
            self::$alertas['error'][] = 'El password debe contener al menos 8 caracteres';
        }

        return self::$alertas;

    }

    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][]= 'El email es Obligatorio';
        }
        if(!$this->contraseña){
            self::$alertas['error'][]= 'La contraseña es Obligatoria';
        }
        return self::$alertas;
    }

    public function exiteUsuario(){
        $query = "SELECT * FROM ". self::$tabla ." WHERE email = '". $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            self::$alertas['error'][] = "El correo ya ha sido registrado";
        }
        return $resultado;
    }

    public function hashearContraseña(){
        $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);
    }

    public function comprobarPasswordAndVerificado($contraseña){
        $resultado = password_verify($contraseña,$this->contraseña);
        if(!$resultado){
            self::$alertas['error'][]= 'Password Incorrecto';
        }else{
            return true;
        }
    }
}