<?php

require_once "Controller/MateriasControlador.php";
require_once "Controller/AlumnosControlador.php";
require_once "Controller/UserControlador.php";
require_once "RouterClass.php";



define ("BASE_URL", '//'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

$r = new Router();

$r->addRoute("tablaMaterias", "GET", "MateriasControlador", "tablaMaterias"); 

$r->addRoute("Select", "GET","MateriasControlador", "getMateriasPorAsig");
$r->addRoute("Insertar", "POST","MateriasControlador", "InsertarMateria");
$r->addRoute("Borrar/:ID", "GET","MateriasControlador", "DeleteMateria");
$r->addRoute("Editar/:ID", "GET", "MateriasControlador", "EditarID");
$r->addRoute("Editar", "POST", "MateriasControlador", "EditarMateria");
$r->addRoute("Detalle/:ID", "GET", "MateriasControlador", "DetalleMateria");
/////////////////////////////////ALUMNO///////////////////////////////
$r->addRoute("tablaAlumnos/:ID", "GET", "AlumnosControlador", "getPaginacion");
$r->addRoute("SelectAlumno", "POST","AlumnosControlador", "getAlumnosPorAsig");
$r->addRoute("InsertarAlumno", "POST","AlumnosControlador", "InsertarAlumno");
$r->addRoute("BorrarAlumno/:ID", "GET","AlumnosControlador", "DeleteAlumno");
$r->addRoute("EditarAlumno/:ID", "GET", "AlumnosControlador", "EditarIdAlumno");
$r->addRoute("EditarAlumno", "POST", "AlumnosControlador", "EditarAlumno");
$r->addRoute("DetalleAlumno/:ID", "GET", "AlumnosControlador", "DetalleAlumno");
$r->addRoute("borrarImagen/:ID", "GET", "AlumnosControlador", "borrarImagen");
/////////////////////////////////USUARIO///////////////////////////////

$r->addRoute("usuarios", "GET", "UserControlador", "getUsuarios"); 
$r->addRoute("cambiarPermiso/:ID", "GET", "UserControlador", "editarUsuario");
$r->addRoute("BorrarUsuario/:ID", "GET", "UserControlador", "borrarUsuario"); 
$r->addRoute("VerificarUsuario", "POST", "UserControlador", "VerificarUsuario");
$r->addRoute("login", "GET", "UserControlador", "login");
$r->addRoute("logout", "GET", "UserControlador", "cerrarSesion");
$r->addRoute("CrearUsuario", "POST","UserControlador", "CrearUsuario");
/////////////////////////////////COMENTARIOS///////////////////////////////
$r->addRoute("comentarios","GET","AlumnosControlador", "getComentariosCSR");


$r->addRoute("main", "GET","MateriasControlador","Home"); 

$r->setDefaultRoute("MateriasControlador", "Home");
//RUN
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

?>