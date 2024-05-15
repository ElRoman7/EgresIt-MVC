<?php

namespace Model;

class Estudiante extends ActiveRecord{
    protected static $tabla = 'estudiantes';
    protected static $columnasDB = ['codigo_estudiante',
                                    'nombre',
                                    'email',
                                    'carrera',
                                    'telefono',
                                    'nivel_estudios',
                                    'cv_pdf_path',
                                    'foto_path',
                                    'contraseña'];
    
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
        $this->id = $args['codigo_estudiante'] ?? null;
        $this->id = $args['nombre'] ?? '';
        $this->id = $args['email'] ?? '';
        $this->id = $args['carrera'] ?? '';
        $this->id = $args['telefono'] ?? '';
        $this->id = $args['nivel_estudios'] ?? '';
        $this->id = $args['cv_pdf_path'] ?? '';
        $this->id = $args['foto_path'] ?? '';
        $this->id = $args['contraseña'] ?? '';
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
}