<?php 

namespace Controllers;

use Model\Aplicacion;
use Model\Aplicaciones;
use Model\EmpresaOferta;
use Model\Oferta;
use MVC\Router;

class OfertaController{
    public static function index(Router $router){
        
    }
    public static function crear(Router $router){
        $titulo = 'Crear Oferta';
        $oferta = new Oferta;
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $oferta->sincronizar($_POST);
            $alertas = $oferta->validarNuevaOferta();

            if(empty($alertas)){
                // debuguear($_SESSION['rol']);
                $oferta->asignarIdEmpresa();

                $oferta->guardar();
                // debuguear($oferta);
                // Todo: Terminar de crear logica para crear Ofertas 
                
            }
        }

        $router->render('oferta/crear',[
            'titulo' => $titulo,
            'alertas' => $alertas
        ]);
    }
    public static function eliminar(Router $router){
        $router->render('oferta/eliminar',[

        ]);
    }
    public static function actualizar(Router $router){
        $router->render('oferta/actualizar',[

        ]);
    }
    public static function ofertas(Router $router){
        if(!isAuth()){
            header('Location: /');
        }
        // Obtener las ofertas con la información de las empresas
        $ofertas = EmpresaOferta::consultarSQL("SELECT ofertas.*, empresas.nombre, empresas.imagen FROM ofertas INNER JOIN empresas ON ofertas.id_empresa = empresas.id");
        // debuguear($ofertas);
        // Mostrar las ofertas y las empresas asociadas
        $router->render('estudiante/ofertas', [
            'ofertas' => $ofertas,
        ]);
    }

    public static function oferta(Router $router){
        if(!isAuth()){
            header('Location: /');
        }
        // Obtener las ofertas con la información de las empresas
        $id = validarORedireccionar('/oferta');
        $oferta = EmpresaOferta::consultarSQL("SELECT ofertas.*, empresas.nombre, empresas.imagen FROM ofertas INNER JOIN empresas ON ofertas.id_empresa = empresas.id WHERE ofertas.id = '". $id ."'");
        $aplicacion = new Aplicacion();
        $idEstudiante = ObtenerIdEstudiante('/oferta');

        // debuguear($oferta);
        // debuguear($ofertas);
        // Mostrar las ofertas y las empresas asociadas
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $aplicacion->capturarDatos($idEstudiante, $id);
            $aplicacion->guardar();
        }
        $router->render('estudiante/oferta', [
            'ofertas' => $oferta,
        ]);
    }
    
    public static function nosotros(Router $router){
        $router->render('estudiante/nosotros',[

        ]);
    }


}