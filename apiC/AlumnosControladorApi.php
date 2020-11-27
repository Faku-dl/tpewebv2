<?php
require_once './Model/MateriaModel.php';
require_once "./apiC/ViewApi.php";
require_once "ApiController.php";
class AlumnosControladorApi extends ApiController
{

    function __construct()
    {   
        parent::__construct();
        $this->model = new MateriaModel();
        $this->view = new ViewApi();
    }
    public function getComentarioPorId($params = null)
    {
        $id_alumno = $params[':ID'];
        $alumno = $this->model->getAlumnosPorId($id_alumno);
        if ($alumno) {
            $comentarios = $this->model->getComentarios($alumno->nombre_alumno);
            $this->view->response($comentarios, 200);
        } else {
            $this->view->response("El no contiene comentarios", 404);
        }
    }

    function deleteComentario($params = null)
    {
        $id_comentario = $params[':ID'];

        if ($this->model->getComentarioPorId($id_comentario)) {

            $this->model->deleteComentario($id_comentario);
            $this->view->response("El comentario con el id: $id_comentario fue borrado", 200);
        } else {
            $this->view->response("El comentario con el $id_comentario no exisite", 404);
        }
    }
    function agregarComentario($params = null){
        
        $body=$this->getData();
        $this->model->InsertarComentario($body->nombre_alumno, $body->contenido, $body->usuario_nombre);
        $this->view->response("El comentario $body->nombre_alumno fue ingresado", 200);
    }
    
    function editarComentario($params = null){
        $id_comentario = $params[':ID'];
        $body=$this->getData();
        
        if ($this->model->getComentarioPorId($id_comentario)) {
            
            $cumplido=$this->model->editarComentario($id_comentario, $body->nombre_alumno, $body->contenido, $body->usuario_nombre);
            if($cumplido>0){
                $this->view->response("El comentario $body->usuario_nombre fue editado", 200);
    
            }else{
                $this->view->response("El comentario $body->usuario_nombre no fue modificado", 204);
            }
        }else{
            $this->view->response("El comentario $body->usuario_nombre no exisite", 404);
        }
    }
}
