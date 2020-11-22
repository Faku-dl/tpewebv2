<?php

require_once "RouterClass.php";
require_once "apiC/AlumnosControladorApi.php";

$router= new Router();

$router->addRoute("alumnos", "GET", "AlumnosControladorApi", "getAlumnos"); 
$router->addRoute("alumnos/:ID", "GET", "AlumnosControladorApi", "getAlumnosporAsig");
$router->addRoute("alumnos/:ID", "DELETE","AlumnosControladorApi", "deleteAlumno");
$router->addRoute("alumnos", "POST", "AlumnosControladorApi", "agregarAlumno"); 
$router->addRoute("alumnos/:ID", "PUT", "AlumnosControladorApi", "editAlumno"); 

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);