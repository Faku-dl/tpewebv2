<?php

require_once "libs/smarty/Smarty.class.php";


class MateriasView
{

  function __construct()
  {
  }
  function MostrarTablaMateria($Titulo, $Asignatura)
  {
    $smarty = new Smarty();
    $smarty->assign("titulo", $Titulo);
    $smarty->assign("asignatura_s", $Asignatura); //Nombre que le damos al array con smarty: "asignatura_s"

    $smarty->display("templates/tablaMaterias.tpl");
  }
  function MostrarEditarTabla($Titulo, $Asignatura, $id_materia)
  {
    $smarty = new Smarty();
    $smarty->assign("titulo", $Titulo);
    $smarty->assign("asignatura_s", $Asignatura); //Nombre que le damos al array con smarty: "asignatura_s"
    $smarty->assign("materia_id", $id_materia);

    $smarty->display("templates/EditarTablaMateria.tpl");
  }
  function MostrarHome()
  {
    //comprobarSiHayUsuario();
    $smarty = new Smarty();
    $smarty->assign("titulo", "Escuelita Virtual de Perón");
    $smarty->display("templates/home.tpl");
  }
  function showDetalles($asignatura)
  {
    $smarty = new Smarty(); 
    $smarty->assign("asignatura_s", $asignatura); 

    $smarty->display("templates/detalles.tpl");
  }
  function showTablaMaterias()
  {
    header("Location:" . BASE_URL . "tablaMaterias");
  }

};
