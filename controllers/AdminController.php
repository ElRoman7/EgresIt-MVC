<?php 

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class AdminController{
    public static function login(Router $router){
        $alertas = [];

        $auth = new Usuario;
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                $usuario = Usuario::where('correo', $auth->correo);
                if($usuario){
                    if($usuario->comprobarPasswordAndVerificado($auth->contraseña)&&$usuario->es_admin === "1"){
                        session_destroy();
                        $_SESSION=[];
                        session_start();
                        $_SESSION['authenticated'] = true;
                        $_SESSION['nombre'] = $usuario->nombre_usuario;
                        $_SESSION['admin'] = true;
                        $_SESSION['rol'] = 'Admin';
                        header('Location: /admin-panel');
                    }
                }
            }else{
                Usuario::setAlerta('error','Usuario no encontrado');
            }
        }
        $alertas = Usuario::getAlertas();

        $router->render('auth/adminLogin',[
            'alertas' => $alertas,
            'auth' => $auth
        ]);
    }

    // Crear cuenta de administrador, (Sólo se usará de vez en cuando)
    public static function crear(Router $router){
        $usuario = new Usuario;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $usuario->sincronizar($_POST);
            $usuario->contraseña = password_hash($usuario->contraseña, PASSWORD_BCRYPT);
            $usuario->es_admin = 1;
            $usuario->guardar();
        }

        $router->render('auth/crear-admin',[
            'usuario' => $usuario
        ]);

    }

    public static function index(Router $router){
        $router->render('admin/index',[

        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
        session_destroy();
        // Redirigir al usuario a donde quieras después de cerrar sesión
        header('Location: /');
    }
}