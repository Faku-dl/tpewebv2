<?php
require_once './Model/MateriaModel.php';
require_once "./apiC/ViewApi.php";
require_once "ApiController.php";
class AlumnosControladorApi extends ApiController
{

    function __construct()
    {
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
        $tareaRealizada = $this->model->deleteAlumno($id_alumno);
        if ($tareaRealizada) {

            $this->view->response("El alumno con el $id_alumno fue borrado", 200);
        } else {
            $this->view->response("El alumno con el $id_alumno no exisite", 404);
        }
    }
    function agregarAlumno($params = null){

        $body=$this->getData();
        var_dump($body);
        $this->model->InsertarAlumno($body->nombre_alumno, $body->email, $body->conducta,$body->calificacion,$body->materia);
        $this->view->response("El alumno $body->nombre_alumno fue ingresado", 200);
    }
}
