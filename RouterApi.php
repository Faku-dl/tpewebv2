<?php

require_once "RouterClass.php";
require_once "apiC/AlumnosControladorApi.php";

$router= new Router();

$router->addRoute("alumnos/:ID", "GET", "AlumnosControladorApi", "getComentarioPorId"); 
$router->addRoute("alumnos/:ID", "DELETE","AlumnosControladorApi", "deleteComentario");
$router->addRoute("alumnos", "POST", "AlumnosControladorApi", "agregarComentario"); 
$router->addRoute("alumnos/:ID", "PUT", "AlumnosControladorApi", "editarComentario"); 

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);