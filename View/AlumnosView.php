<?php
require_once "libs/smarty/Smarty.class.php";

class AlumnosView
{

  function __construct()
  {
  }
///////////////////////////////////////ALUMNOS/////////////////////////////////////
  function mostrarTablaAlumnos($Titulo, $Alumnos, $Asignatura, $paginas)
  {
    $smarty = new Smarty();
    $smarty->assign("titulo", $Titulo);
    $smarty->assign("alumnos_s", $Alumnos); //Nombre que le damos al array con smarty: "Alumnos_s"
    $smarty->assign("asignatura_s", $Asignatura);
    $smarty->assign("paginas", $paginas);
    $smarty->display("templates/tablaAlumnos.tpl");
  }
  function mostrarEditarTablaAlumnos($Titulo, $Alumnos, $id_alumno,$alumno, $Asignatura)
  {
    $smarty = new Smarty();
    $smarty->assign("titulo", $Titulo);
    $smarty->assign("alumnos_s", $Alumnos); //Nombre que le damos al array con smarty: "alumnos_s"
    $smarty->assign("asignatura_s", $Asignatura);
    $smarty->assign("alumno_s", $alumno);
    $smarty->assign("alumno_id", $id_alumno);
    $smarty->display("templates/EditarTablaAlumno.tpl");
  }

  function showDetallesAlumno($Alumno)
  {
    $smarty = new Smarty();  //ESTO ES CUALQUIER COSA
    $smarty->assign("titulo", $Alumno->nombre_alumno);
    $smarty->assign("tituloMateria", $Alumno->materia);
    $smarty->assign("asignatura_s", $Alumno);
    $smarty->assign("alumno_s", $Alumno);
    

    
    $smarty->display("templates/detalleAlumno.tpl");
  }
  function showTablaAlumnos()
  {
    header("Location:" . BASE_URL . "tablaAlumnos/1");
  }


  function showComentariosCSR() {
    $smarty = new Smarty();
    $smarty->assign('titulo', "Lista de comentarios del Alumno");
    $smarty->display('templates/comentarios.tpl'); // muestro el template 
}

};