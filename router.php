<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' .$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

include_once "./app/controllers/marca.api.controller.php";
include_once "./app/controllers/producto.api.controller.php";


include_once "./app/middlewares/leerSesion.php";
include_once "./app/middlewares/mandarteLogin.php";

require_once "libs/router.php";
require_once "libs/request.php";
require_once "libs/response.php";


$router = new Router();
// VER ID
 //                 endpoint   verbo    controller           metodo

 //LISTADO DE COLECCION ENTERA POR GET
$router->addRoute('marcas', 'GET', 'MarcaApiController', 'mostrarTodo');

//Productos de una marca elegida
$router->addRoute('marca/:marca_producto', 'GET', 'MarcaApiController', 'mostrar');

//OBTENER POR GET UNA ENTIDAD POR ID
$router->addRoute('producto/:id_productos', 'GET', 'ProductoApiController', 'mostrar');

//PUT
$router->addRoute('producto/:id_productos', 'PUT', 'ProductoApiController', 'modificar');

//POST

$router->addRoute('producto', 'POST', 'ProductoApiController', 'añadir');



$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
?>
