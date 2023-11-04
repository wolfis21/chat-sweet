<?php 
/* 
// Obtener la URL solicitada
$url = $_SERVER['REQUEST_URI'];

// Filtrar la URL para eliminar cualquier parámetro de consulta (?param=value) y obtener solo la ruta
$url = strtok($url, '?');
$url = explode('/', $url);

// Rutas disponibles
$routes = [
    '/' => 'HomeController@index',
    '/users' => 'UserController@index',
    '/users/create' => 'UserController@create',
    '/users/{id}' => 'UserController@show',
    '/users/{id}/edit' => 'UserController@edit',
    '/users/{id}/update' => 'UserController@update',
    '/users/{id}/delete' => 'UserController@delete',
    // Agrega más rutas de los otros casos 
];

// Verificar si la ruta solicitada existe
if (array_key_exists($url[0], $routes)) {
    // Obtener el controlador y el método correspondiente a la ruta
    $route = $routes[$url[0]];
    $routeParts = explode('@', $route);
    $controllerName = $routeParts[0];
    $methodName = $routeParts[1];

    // Incluir el archivo del controlador correspondiente
    require_once 'controller/' . $controllerName . '.php';

    // Crear una instancia del controlador
    $controller = new $controllerName;

    // Llamar al método del controlador correspondiente
    $controller->$methodName();
} else {
    // Manejar la ruta no encontrada
    echo 'Ruta no encontrada.';
} */

/* // Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['h']))
{
    $controller = 'HomeController';
    require_once "controller/$controller.php";
    //$controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
} */
/*
require 'Routing.php';
require 'controller/HomeController.php';

$router = new Routing;

$router->add('/',function(){
  echo "Hola Mundo - Esta es una ruta simple";
});

//de esta manera llamamos una funcion dentro de una clase
//class @ method
$router->add('/home','HomeController@showHome');

$router->add('/about','HomeController@showAbout');

$router->run();*/

require_once 'autoload.php';
require_once 'routes/web.php';