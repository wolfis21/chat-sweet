<?php
require_once 'models/Database.php';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    $controller = 'Users';
    require_once "controllers/{$controller}Controller.php";
    $controller = new UsersController();
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    
    // Instanciamos el controlador
    require_once "controllers/{$controller}Controller.php";
    $controller = ($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}