<?php
require_once "RouterAvanzado.php";
require_once "Controller/UserControlador.php";


class UserModel
{

    private $db;


    public function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;' . 'dbname=escuela;charset=utf8', 'root', '');
    }

    function TraerUsuario($user){
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
      
    function CrearUsuario($nombre, $administrador,$email,$password)
    {
        $sentencia = $this->db->prepare('INSERT INTO usuario (nombre_usuario,administrador, email, password_u) VALUES(?,?,?,?)');
        $sentencia->execute(array($nombre, $administrador,$email,$password));
    }
    
    function getUsuarios(){
        $sentencia = $this->db->prepare("SELECT * FROM usuario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function editUsuario($email,$administrador)
    {

        $sentencia = $this->db->prepare('UPDATE usuario  SET administrador=? WHERE email=?');
        $sentencia->execute(array($email,$administrador));
    }

    function deleteUser($id_usuario = null){
        $sentencia = $this->db->prepare('DELETE FROM usuario WHERE id_usuario=?');
        $sentencia->execute(array($id_usuario));
        return $sentencia->rowCount();
    }


};
