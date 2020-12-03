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
$r->addRoute("Borrar/:ID", "GET","MateriasControlador", "deleteMateria");
$r->addRoute("Editar/:ID", "GET", "MateriasControlador", "editarID");
$r->addRoute("Editar", "POST", "MateriasControlador", "editarMateria");
$r->addRoute("Detalle/:ID", "GET", "MateriasControlador", "detalleMateria");
/////////////////////////////////ALUMNO///////////////////////////////
$r->addRoute("tablaAlumnos/:ID", "GET", "AlumnosControlador", "getPaginacion");
$r->addRoute("SelectAlumno", "POST","AlumnosControlador", "getAlumnosPorAsig");
$r->addRoute("InsertarAlumno", "POST","AlumnosControlador", "insertarAlumno");
$r->addRoute("BorrarAlumno/:ID", "GET","AlumnosControlador", "deleteAlumno");
$r->addRoute("EditarAlumno/:ID", "GET", "AlumnosControlador", "editarIdAlumno");
$r->addRoute("EditarAlumno", "POST", "AlumnosControlador", "editarAlumno");
$r->addRoute("DetalleAlumno/:ID", "GET", "AlumnosControlador", "detalleAlumno");
$r->addRoute("borrarImagen/:ID", "GET", "AlumnosControlador", "borrarImagen");
/////////////////////////////////USUARIO///////////////////////////////

$r->addRoute("usuarios", "GET", "UserControlador", "getUsuarios"); 
$r->addRoute("cambiarPermiso/:ID", "GET", "UserControlador", "editarUsuario");
$r->addRoute("BorrarUsuario/:ID", "GET", "UserControlador", "borrarUsuario"); 
$r->addRoute("VerificarUsuario", "POST", "UserControlador", "verificarUsuario");
$r->addRoute("login", "GET", "UserControlador", "login");
$r->addRoute("logout", "GET", "UserControlador", "cerrarSesion");
$r->addRoute("CrearUsuario", "POST","UserControlador", "crearUsuario");
/////////////////////////////////COMENTARIOS///////////////////////////////
$r->addRoute("comentarios","GET","AlumnosControlador", "getComentariosCSR");


$r->addRoute("main", "GET","MateriasControlador","home"); 

$r->setDefaultRoute("MateriasControlador", "home");
//RUN
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

?>