<?php

define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function isAuth(): bool {
    return isset($_SESSION['authenticated']);
}


function isAdmin() : void{
    if(!isset($_SESSION['admin'])){
        header('Location: /');
    }
}

function comprobarTipoDeUsuario($tipodeUsuario){
    if(isset($_SESSION['rol'])){
        if($_SESSION['rol'] == $tipodeUsuario){
            return true;
        }
        return false;
    }else{
        return false;
    }
}

function getIdSesion(){
    if(isset($_SESSION['id'])){
        // debuguear($_SESSION['id']);
        return $_SESSION['id'];
    }
}

function validarORedireccionar(string $url){
    //! Validar que sea un ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: $url");
    }

    return $id;
}

function ObtenerIdEstudiante(string $url){
        //! Validar que sea un ID valido
        $id = $_SESSION['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    
        if(!$id){
            header("Location: $url");
        }
    
        return $id;
}