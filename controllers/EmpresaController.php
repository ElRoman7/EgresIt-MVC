<?php 

namespace Controllers;

use Model\Empresa;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Estudiante;
use Model\Oferta;

class EmpresaController{
    public static function registro(Router $router) {
        $empresa = new Empresa();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empresa->sincronizar($_POST);
            $alertas = $empresa->validarNuevaEmpresa();

            if (!empty($_FILES['imagen']['tmp_name']) && $alertas === []) {
                // Verificar si hay algún error al subir el archivo
                if ($_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
                    // Manejar el error de subida del archivo
                    $alertas[] = "Error al subir la imagen: " . $_FILES['imagen']['error'];
                } else {
                    // Ruta donde se guardará la imagen (ajústala según tu estructura de carpetas)
                    $rutaImagen = CARPETA_IMAGENES;

                    // Obtener el nombre del archivo original
                    $nombreAleatorio = md5(uniqid(rand(), true));
                    $nombreImagen = $nombreAleatorio . ".jpg";

                    // Mover el archivo desde la ubicación temporal a la carpeta deseada
                    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen . $nombreImagen)) {
                        // Asignar el nombre de la imagen a la empresa
                        $empresa->setImage($nombreImagen);
                    } else {
                        // Manejar el error de movimiento del archivo
                        $alertas[] = "Error al mover la imagen al directorio de destino.";
                    }
                }
            }

            if (empty($alertas)) {
                $empresa->hashearContraseña();
                $resultado = $empresa->guardar();

                if ($resultado) {
                    header('Location: /empresa');
                } else {
                    header('Location: registro-empresa');
                }
            }
        }

        $router->render('auth/empresa-registro', [
            'empresa' => $empresa,
            'alertas' => $alertas
        ]);
    }

    public static function login(Router $router){
        $auth = new Empresa;
        $alertas = [];
        if(isAuth() && comprobarTipoDeUsuario('Empresa')){
            header('Location: /empresa');
        }

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth = new Empresa($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)){
                $empresa = Empresa::where('email', $auth->email);
                if($empresa){
                    if($empresa->comprobarPasswordAndVerificado($auth->contraseña)){
                        session_destroy();
                        $_SESSION=[];
                        session_start();
                        // debuguear($empresa);
                        $_SESSION['id'] = $empresa->id;
                        $_SESSION['nombre'] = $empresa->nombre;
                        $_SESSION['authenticated'] = true;
                        $_SESSION['rol'] = 'Empresa';

                        header('Location: /empresa');

                    }else{
                        Empresa::setAlerta('error','Usuario no encontrado o contraseña incrorrecta');
                        $alertas = Empresa::getAlertas();
                    }
                }
            }
        }
        $router->render('auth/empresa-login',[
            'auth' => $auth,
            'alertas' => $alertas
        ]);
        
        
    }
    
    public static function index(Router $router){
        // if(comprobarTipoDeUsuario('Empresa') == false){
        //     header('Location: /empresa-login');
        // }
        // Obtener Id de la sesion;
        // debuguear($_SESSION);
        if(comprobarTipoDeUsuario('Empresa')){
            
        }else{
            header('Location: /empresa-login');
        }
        // if(isAuth()){
        //     if(!comprobarTipoDeUsuario('Empresa')){
        //         header('/empresa-login');
        //     }
        // }

        $id = getIdSesion();
        $ofertas = Oferta::getNoLimit('id_empresa', $id);
        // debuguear($ofertas);
        $empresas = Empresa::all();
        $router->render('empresa/index',[
            'ofertas' => $ofertas,
            'empresas' => $empresas
        ]);
    }

    public static function aplicaciones(Router $router){
        $idOferta = validarORedireccionar('/aplicaciones');
        // debuguear($idOferta);
        $estudiantes = Estudiante::consultarSQL("    SELECT 
        aplicaciones.id AS id_aplicacion,
        aplicaciones.fecha_aplicacion,
        estudiantes.id AS id_estudiante,
        estudiantes.nombre AS nombre_estudiante,
        estudiantes.email,
        estudiantes.carrera,
        estudiantes.telefono,
        estudiantes.nivel_estudios,
        estudiantes.cv_pdf_path,
        estudiantes.foto_path,
        ofertas.id,
        ofertas.nombre_oferta,
        ofertas.descripcion
    FROM 
        aplicaciones
    INNER JOIN 
        estudiantes ON aplicaciones.id_estudiante = estudiantes.id
    INNER JOIN
        ofertas ON aplicaciones.id_oferta = ofertas.id
    WHERE 
        ofertas.id = '". $idOferta ."' ");
        // debuguear($estudiantes);

        $router->render('empresa/aplicaciones',[
            'estudiantes' => $estudiantes 
        ]);

    } 
}