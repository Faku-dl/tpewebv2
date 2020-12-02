<?php

class AuthHelper {

    private $MateriasModel;


    public function __construct() {


        $this->MateriasModel = new MateriaModel();
    }

    public function login($usuario) {
        session_start();
        $_SESSION['ADMIN'] = $usuario->administrador;
        $_SESSION['nombre_usuario'] = $usuario->nombre_usuario;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    function checkAdmin(){
    
        if($_SESSION['ADMIN']!=0 || $_SESSION['ADMIN']== null )
        return false;
        else return true;

    }

    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['nombre_usuario'])) {
            header('Location: ' . LOGIN);
            die();
        }       
    }

    public function getNombreDeUsuario() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['nombre_usuario'];
    }
       
    public function comprobarSiHayUsuario()
    {
        session_start();
        if (empty($_SESSION['nombre_usuario'])) {
            
        }else {
            if (!empty($_SESSION['navegando']) && (time() - $_SESSION['navegando'] > 20000)) {

                header("Location: " . LOGOUT);
            }
        }
        $_SESSION['navegando'] = time();
    }

    public function getTodasLasMaterias(){

    
        return $this->MateriasModel->getTodasLasMaterias();
     }

}
