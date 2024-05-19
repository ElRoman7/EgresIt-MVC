<?php

namespace Model;

class Usuario extends ActiveRecord{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id',
                                    'nombre_usuario',
                                    'contraseña',
                                    'correo',
                                    'es_admin'];
    
    public $id;
    public $nombre_usuario;
    public $contraseña;
    public $correo;
    public $es_admin;

    public function __construct($args = [])
    {
        $this->id =     $args['id'] ?? null;
        $this->nombre_usuario = $args['nombre_usuario'] ?? '';
        $this->contraseña =     $args['contraseña'] ?? '';
        $this->correo =         $args['correo'] ?? '';
        $this->es_admin =       $args['es_admin'] ?? null;
    }

    public function hashPassword(){
        $this->contraseña = password_hash($this->password,PASSWORD_BCRYPT);
    }
    
    public function validarLogin(){
        if(empty($this->correo)){
            self::$alertas['error'][] = 'El Corrreo es Obligatorio';
        }
        if(!$this->contraseña){
            self::$alertas['error'][] = 'La Contraseña es Obligatoria';
        }
        return self::$alertas;
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