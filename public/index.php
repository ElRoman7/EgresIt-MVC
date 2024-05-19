<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\EmpresaController;
use Controllers\EstudianteController;
use Controllers\holaMundoController;
use Controllers\OfertaController;
use Model\Usuario;
use MVC\Router;

$router = new Router();

// Pagina Hola Mundo
$router->get('/',[holaMundoController::class, 'holaMundo']);


//! Admin
//? Login
$router->get('/admin',[AdminController::class, 'login']);
$router->post('/admin',[AdminController::class, 'login']);
//? Crear cuenta 
$router->get('/admin-crear',[AdminController::class, 'crear']);
$router->post('/admin-crear',[AdminController::class, 'crear']);

$router->get('/admin-panel',[AdminController::class, 'index']);
$router->post('/admin-panel',[AdminController::class, 'index']);

// !Estudiante
// ? Registro
$router->get('/registro', [EstudianteController::class, 'registro']);
$router->post('/registro', [EstudianteController::class, 'registro']);
// ?Iniciar Sesion
$router->get('/login', [EstudianteController::class, 'login']);
$router->post('/login', [EstudianteController::class, 'login']);


// !Logout
$router->post('/logout', [AdminController::class, 'logout']);
$router->get('/logout', [AdminController::class, 'logout']);

// !Empresa
// ? Registro
$router->get('/empresa-registro', [EmpresaController::class, 'registro']);
$router->post('/empresa-registro', [EmpresaController::class, 'registro']);
// ?Iniciar Sesion
$router->get('/empresa-login', [EmpresaController::class, 'login']);
$router->post('/empresa-login', [EmpresaController::class, 'login']);
// ? Pagina Index de Empresa
$router->get('/empresa', [EmpresaController::class, 'index']);
$router->get('/aplicaciones', [EmpresaController::class, 'aplicaciones']);


// !Ofertas
$router->get('/oferta-crear', [OfertaController::class, 'crear']);
$router->post('/oferta-crear', [OfertaController::class, 'crear']);

$router->get('/oferta-eliminar', [OfertaController::class, 'eliminar']);
$router->post('/oferta-eliminar', [OfertaController::class, 'eliminar']);

$router->get('/oferta-actualizar', [OfertaController::class, 'actualizar']);
$router->post('/oferta-actualizar', [OfertaController::class, 'actualizar']);

// !Paginas de Estudiante
$router->get('/ofertas',[OfertaController::class, 'ofertas']);
$router->get('/oferta',[OfertaController::class, 'oferta']);
$router->post('/oferta',[OfertaController::class, 'oferta']);
$router->get('/nosotros',[OfertaController::class, 'nosotros']);

// !Aplicar
// $router->get('/oferta-aplicar',[])

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();