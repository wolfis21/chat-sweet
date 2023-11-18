<?php
require_once 'models/Database.php';
// require_once 'view/login/login.php';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    $controller = 'Users';
    require_once "controllers/$controller.controller.php";
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    
    // Instanciamos el controlador
    require_once "controllers/$controller.controller.php";
    /* $controller = ucwords($controller) . 'Controller'; */
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}