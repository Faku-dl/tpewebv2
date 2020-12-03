<?php
require_once "./RouterAvanzado.php";
require_once "Model/UserModel.php";
require_once "View/UserView.php";
class UserControlador
{

    private $view;
    private $model;
    private $authHelper;
    function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
    }

    function cerrarSesion()
    {
        session_start();
        session_destroy();
        header("Location: " . LOGIN);
    }

    function login()
    {
        $this->view->showLogin();
    }

    function crearUsuario()
    {
        if (empty($_POST['crear_email'])) {

            $this->view->showLogin("nada@nada.com no es un email, no se haga el gracioso y complete los campos con lo que se solicita POR FAVOR!");
        } else if (empty($_POST['crear_nombre'])) {

            $this->view->showLogin("...(vacio)... no es un nombre, si sus padres no le pusieron un nombre inventense uno... MUCHAS GRACIAS!");
        } else {
            if ($userFromDB = $this->model->traerUsuario($_POST['crear_nombre'])) {

                $this->view->showLogin("El nombre de usuario ya existe: use la imaginación!");
            } else {

                $hash = password_hash($_POST['crear_password'], PASSWORD_DEFAULT);
                $user = $_POST["crear_email"];
                $userFromDB = $this->model->traerUsuario($user);
                if ($userFromDB) {
                    $this->view->showLogin("Ya usted tiene una cuenta con ese email, no aceptamos cuentas troll!");
                } else {
                    $this->model->crearUsuario($_POST['crear_nombre'], 0, $_POST['crear_email'], $hash);
                    session_start();
                    $_SESSION['nombre_usuario'] = $_POST['crear_nombre'];
                    $_SESSION['navegando'] = time();

                    header("Location: " . BASE_URL . "Home");
                }
            }
        }
    }
    function verificarUsuario()
    {
        $user = $_POST["validar_email"];
        $pass = $_POST["validad_password"];

        if (!empty($user)) {
            $userFromDB = $this->model->TraerUsuario($user);

            if (isset($userFromDB) && $userFromDB) {
                // Existe el usuario

                if (password_verify($pass, $userFromDB->password_u)) {

                    session_start();
                    $_SESSION['nombre_usuario'] = $userFromDB->nombre_usuario;
                    $_SESSION['ADMIN'] = $userFromDB->administrador;
                    $_SESSION['navegando'] = time();

                    header("Location: " . BASE_URL . "Home");
                } else {
                    $this->view->showLogin("Contraseña incorrecta: si olvido su contraseña tome la pastillita o anotela");
                }
            } else {
                // No existe el user en la DB
                $this->view->showLogin("El usuario no existe");
            }
        } else {
            $this->view->showLogin("nada@nada.com no es un email, no se haga el gracioso y complete los campos con lo que se solicita POR FAVOR!");
        }
    }

    function editarUsuario($params = null)
    {  
        session_start();
        if ($_SESSION['ADMIN']!=0) {
            $id_usuario = $params[':ID'];
            $this->model->cambiarPermisos($id_usuario);
            $usuarios = $this->model->getUsuarios();
            $this->view->showTablaUsuarios($usuarios);
        }
    }


    function borrarUsuario($params = null)
    {
        session_start();
        if ($_SESSION['ADMIN']!=0) {
            $id_usuario = $params[':ID'];
            $this->model->deleteUser($id_usuario);
            $usuarios = $this->model->getUsuarios();
            $this->view->showtablaUsuarios($usuarios);
        }
    }

    function getUsuarios()
    {   
        session_start();
        if(!empty($_SESSION['nombre_usuario'])){
            
            if ($_SESSION['ADMIN']!=0) {
                $usuarios = $this->model->getUsuarios();
                $this->view->showTablaUsuarios($usuarios);
            }
            else{
                $usuarios = $this->model->traerUsuarioPorNombre($_SESSION['nombre_usuario']);
                $this->view->showNotAdmin($usuarios);

            }
            }else{

                $usuarios= "invitado";
                $this->view->showNotAdmin($usuarios);

        }
    }

    function entrarSinUsuario()
    {
        session_start();
        $_SESSION['nombre_usuario'] = "admin";
        header("Location: " . BASE_URL . "Home");
    }
}
