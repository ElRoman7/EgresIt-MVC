<?php 

namespace Model;

class Aplicacion extends ActiveRecord{
    protected static $tabla = 'aplicaciones';
    protected static $columnasDB = [
        'id',
        'id_estudiante',
        'id_oferta',
    ];

    public $id;
    public $id_estudiante;
    public $id_oferta;

    public function __construct($args = [])
    {   
        $this->id = $args['id'] ?? null;
        $this->id_estudiante = $args['id_estudiante'] ?? null;
        $this->id_oferta = $args['id_oferta'] ?? null;
    }

    public function capturarDatos($id_estudiante, $id_oferta){
        $this->id_estudiante = $id_estudiante;
        $this->id_oferta = $id_oferta;
    }
}