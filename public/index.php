<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\holaMundoController;

$router = new Router();

// Pagina Hola Mundo
$router->get('/',[holaMundoController::class, 'holaMundo']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();