<?php

namespace Controllers;

use MVC\Router;


class holaMundoController{
    public static function holaMundo(Router $router){
        $holaMundo = 'Hola mundo';

        $router->render('hola-mundo',[
            'hola' => $holaMundo,
        ]);
    }
}

?>