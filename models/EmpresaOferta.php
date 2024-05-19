<?php


namespace Model;

class EmpresaOferta extends ActiveRecord{
    protected static $tabla = 'empresas';
    protected static $columnasDB = [
        'id',
        'nombre_oferta',
        'imagen',
        'descripcion',
        'id_empresa',
        'tipo',
        'nombre'
    ];
    public $id;
    public $nombre_oferta;
    public $imagen;
    public $descripcion;
    public $id_empresa;
    public $tipo;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_oferta = $args['nombre_oferta'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->id_empresa = $args['id_empresa'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
    }
}