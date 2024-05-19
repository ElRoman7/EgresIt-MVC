<?php 

namespace Model;

class Oferta extends ActiveRecord{
    protected static $tabla = 'ofertas';
    protected static $columnasDB = ['id',
                                    'nombre_oferta',
                                    'descripcion',
                                    'id_empresa',
                                    'tipo'];
    
    public $id;
    public $nombre_oferta;
    public $descripcion;
    public $id_empresa;
    public $tipo;

    public function __construct($args = [])
    {
        $this->id =             $args['id'] ?? null;         
        $this->nombre_oferta =  $args['nombre_oferta'] ?? '';         
        $this->descripcion =    $args['descripcion'] ?? '';         
        $this->id_empresa =     $args['id_empresa'] ?? '';         
        $this->tipo =           $args['tipo'] ?? '';         
    }

    public function validarNuevaOferta(){
        if(!$this->nombre_oferta){
            self::$alertas['error'][] = 'El nombre de la oferta es obligatorio';
        }
        if(!$this->descripcion){
            self::$alertas['error'][] = 'La descripcion de la oferta es obligatoria';
        }
        if(!$this->tipo){
            self::$alertas['error'][] = 'El tipo de la oferta es obligatorio';
        }
        return self::$alertas;
    }

    public function asignarIdEmpresa(){
        $id = $_SESSION['id'];
        
        // debuguear($id);
        $this->id_empresa = $id;
    }
}