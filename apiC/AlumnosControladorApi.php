<?php
require_once './Model/MateriaModel.php';
require_once "./apiC/ViewApi.php";
require_once "ApiController.php";
require_once "./Model/AlumnosModel.php";
require_once "./Model/ComentariosModel.php";

class AlumnosControladorApi extends ApiController
{

    function __construct()
    {   
        parent::__construct();
        $this->alumnosModel = new AlumnosModel();
        $this->comentariosModel = new ComentariosModel();
        $this->view = new ViewApi();
    }
    public function getComentarioPorId($params = null)
    {
        $id_alumno = $params[':ID'];
        $alumno = $this->alumnosModel->getAlumnosPorId($id_alumno);
        if ($alumno) {
            $comentarios = $this->comentariosModel->getComentarios($alumno->nombre_alumno);
        
            $this->view->response($comentarios, 200);
        } else {
            $this->view->response("El no contiene comentarios", 404);
        }
    }

    function deleteComentario($params = null)
    {

        session_start();
        if($_SESSION["ADMIN"]==1){

            $id_comentario = $params[':ID'];
    
            if ($this->comentariosModel->getComentariosPorId($id_comentario)) {
    
                $this->comentariosModel->deleteComentario($id_comentario);
                $this->view->response("El comentario con el id: $id_comentario fue borrado", 200);
            } else {
                $this->view->response("El comentario con el $id_comentario no exisite", 404);
            }
        } else{
            $this->view->response("Usted no tiene los permisos para borrar comentarios", 401);
        }
    }
    function agregarComentario($params = null){
        
        $body=$this->getData();
        $this->comentariosModel->InsertarComentario($body->nombre_alumno, $body->contenido, $body->usuario_nombre,$body->valoracion_alumno);
        $this->view->response("El comentario $body->nombre_alumno fue ingresado", 200);
    }
    
}
