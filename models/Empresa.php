<?php 

namespace Model;

class Empresa extends ActiveRecord{
    protected static $tabla = 'empresas';
    protected static $columnasDB = [
        'id',
        'RFC',
        'nombre',
        'direccion',
        'imagen',
        'contraseña',
        'email'
    ];

    public $id;
    public $RFC;
    public $nombre;
    public $direccion;
    public $imagen;
    public $contraseña;
    public $email;

    public function __construct($args = [])
    {
        $this->id =             $args['id'] ?? null;
        $this->RFC =            $args['RFC'] ?? '';
        $this->nombre =         $args['nombre'] ?? '';
        $this->direccion =      $args['direccion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->contraseña =     $args['contraseña'] ?? '';
        $this->email =          $args['email'] ?? '';
    }

    // TODO: Validaciones Para el Login de la empresa

    public function validarNuevaEmpresa(){
        if(!$this->RFC){
            self::$alertas['error'][]='El RFC es obligatorio';
        }
        if(!$this->contraseña){
            self::$alertas['error'][]='La contraseña es obligatoria';
        }else if(!strlen($this->contraseña) > 8){
            self::$alertas['error'][]='La contraseña debe tener al menos 8 caracteres';
        }
        if(!$this->email){
            self::$alertas['error'][]='El email es obligatorio';
        }else{
            $this->existeEmpresa();
        }
        if(!$this->nombre){
            self::$alertas['error'][]='El nombre es obligatorio';
        }
        if(!$this->direccion){
            self::$alertas['error'][]='La direccion es obligatoria';
        }


        return self::$alertas;

    }

    public function validarLogin(){
        if(!$this->contraseña){
            self::$alertas['error'][]='La contraseña es obligatoria';
        }
        if(!$this->email){
            self::$alertas['error'][]='El email es obligatorio';
        }
        return self::$alertas;
    }

    public function existeEmpresa(){
        $query = "SELECT * FROM ". self::$tabla ." WHERE email = '". $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][]="El correo ya ha sido registrado";
        }

        return self::$alertas;
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