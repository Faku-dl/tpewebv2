<?php

require_once "./libs/smarty/Smarty.class.php";

class UserView{

    private $title;
    

    function __construct(){
        $this->title = "Login";
    }

    function ShowLogin($mensaje = null){

        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/login.tpl');
    }

    function ShowTablaUsuarios($usuarios = null){
        $smarty = new Smarty();
        $this->title= "Tabla de Usuarios";
        $smarty->assign('titulo', $this->title);
        $smarty->assign('usuarios_s', $usuarios);

        $smarty->display('templates/tablaUsuarios.tpl');
    }

    function showNotAdmin(){
        $smarty = new Smarty();
        $smarty->assign('titulo', "Acceso denegado");
        $smarty->display('templates/notAdmin.tpl');
    }
}


?>
