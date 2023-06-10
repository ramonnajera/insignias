<?php
ob_start();
session_start(['cookie_lifetime' => 43200,'cookie_secure' => false,'cookie_httponly' => true]);
// session_start(['cookie_lifetime' => 43200,'cookie_secure' => true,'cookie_httponly' => true]);

require_once 'config/parameters.php';
require_once 'autoload.php';
require_once 'config/conection/conection.php';
require_once 'helpers/utils.php';
include_once "helpers/responses.class.php";
require_once 'views/layout/header_v.php';

$conection = new conection;
function show_error(){
    $error = new ErrorController();
    $error->error_404();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
}else{
    show_error();
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();
    }else{
        show_error();
    }
}else{
    show_error();
}

require_once 'views/layout/footer_v.php';
ob_end_flush();