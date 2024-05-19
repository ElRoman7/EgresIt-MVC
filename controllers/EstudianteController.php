<?php 

namespace Controllers;

use Model\Estudiante;
use MVC\Router;

class EstudianteController{
    public static function registro(Router $router){
        $estudiante = new Estudiante;
        $alertas = [];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $estudiante->sincronizar($_POST);
            $alertas = $estudiante->validarNuevaCuenta();

            if(empty($alertas)){
                $resultado = $estudiante->exiteUsuario();
                if($resultado->num_rows){
                    $alertas = Estudiante::getAlertas();
                }else{
                    // Hashear Password
                    $estudiante->hashearContraseña();

                    // Crear Usuario
                    // debuguear($estudiante);
                    $resultado = $estudiante->guardar();

                    if($resultado){
                        header('Location: /');
                    }
                }
            }

        }
        $router->render('auth/crear-cuenta-e',[
            'estudiante' => $estudiante,
            'alertas' => $alertas
        ]);
    }

    public static function login(Router $router){
        $alertas =[];
        $auth = new Estudiante;

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Estudiante($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                $estudiante = Estudiante::where('email', $auth->email);

                if($estudiante){
                    if($estudiante->comprobarPasswordAndVerificado($auth->contraseña)){
                        session_destroy();
                        $_SESSION = [];
                        session_start();
                        $_SESSION['id'] = $estudiante->id;
                        $_SESSION['nombre'] = $estudiante->nombre;
                        $_SESSION['codigo_estudiante'] = $estudiante->codigo_estudiante;
                        $_SESSION['authenticated'] = true;
                        $_SESSION['rol'] = 'Estudiante';

                        header('Location: /');

                    }else{
                        Estudiante::setAlerta('error', 'Usuario no encontrado o contraseña incorrecta');
                        $alertas = Estudiante::getAlertas();
                    }
                }

            }
        }
        $router->render('auth/login-e',[
            'auth' => $auth,
            'alertas' => $alertas
        ]);
    }

}