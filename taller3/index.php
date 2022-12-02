<?php

require_once 'config/global.php';

if (!isset($_GET["controller"])) $_GET["controller"] = constant("CONTROLADOR_DEFECTO");
if (!isset($_GET["action"])) $_GET["action"] = constant("ACCION_DEFECTO");

$dir_controlador = 'controller/' . $_GET["controller"] . 'Controller.php';

/* Comprobar si el controllador existe */
if (!file_exists($dir_controlador)) $dir_controlador = 'controller/' . constant("CONTROLADOR_DEFECTO") . 'Controller.php';

/* Cargar controlador */
require_once $dir_controlador;
$nombreCotrolador = $_GET["controller"] . 'Controller';
$controller = new $nombreCotrolador();

/* Comprobar si el método está definido */
$datosVista = [];
if (method_exists($controller, $_GET["action"])) {
    $datosVista['data'] = $controller->{$_GET["action"]}();
}else{
    $datosVista['data'] = ['error' => 'No hay metodo para esta accion'];
}

// echo json_encode($datosVista);
/* Cargar Vista  */
require_once 'view/' . $controller->vista . 'View.php';
