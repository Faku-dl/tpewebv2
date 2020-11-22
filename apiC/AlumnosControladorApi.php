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
    public function getAlumnos()
    {
        $alumnos = $this->model->getTodosLosAlumnos();
        $this->view->response($alumnos, 200);
    }
    public function getAlumnosporAsig($params = null)
    {
        $id_materia = $params[':ID'];
        $alumnos = $this->model->getAlumnosporAsig($id_materia);
        if ($alumnos) {

            $this->view->response($alumnos, 200);
        } else {
            $this->view->response("La materia $id_materia no contiene alumnos", 404);
        }
    }

    function deleteAlumno($params = null)
    {
        $id_alumno = $params[':ID'];

        if ($this->model->getAlumnosPorId($id_alumno)) {

            $this->model->deleteAlumno($id_alumno);
            $this->view->response("El alumno con el id: $id_alumno fue borrado", 200);
        } else {
            $this->view->response("El alumno con el $id_alumno no exisite", 404);
        }
    }
    function agregarAlumno($params = null){
        
        $body=$this->getData();
        $this->model->InsertarAlumno($body->nombre_alumno, $body->email, $body->conducta,$body->calificacion,$body->materia);
        $this->view->response("El alumno $body->nombre_alumno fue ingresado", 200);
    }
    
    function editAlumno($params = null){
        $id_alumno = $params[':ID'];
        $body=$this->getData();
        
        if ($this->model->getAlumnosPorId($id_alumno)) {
            
            $cumplido=$this->model->editAlumno($id_alumno, $body->nombre_alumno, $body->email, $body->conducta,$body->calificacion,$body->materia);
            if($cumplido>0){
                $this->view->response("El alumno $body->nombre_alumno fue editado", 200);
    
            }else{
                $this->view->response("El alumno $body->nombre_alumno no fue modificado", 204);
            }
        }else{
            $this->view->response("El alumno $body->nombre_alumno no exisite", 404);
        }
    }
}
