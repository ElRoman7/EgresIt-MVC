<?php

namespace Controllers;

use Model\EmpresaOferta;
use Model\Oferta;
use MVC\Router;


class holaMundoController{
    public static function holaMundo(Router $router){

        $ofertas = EmpresaOferta::consultarSQL("SELECT ofertas.*, empresas.nombre, empresas.imagen FROM ofertas INNER JOIN empresas ON ofertas.id_empresa = empresas.id");
        $holaMundo = 'Hola mundo';
        // debuguear($ofertas);
        $router->render('hola-mundo',[
            'hola' => $holaMundo,
            'ofertas'=>$ofertas
        ]);
    }
}

?>