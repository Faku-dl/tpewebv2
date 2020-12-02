<?php
require_once "./RouterAvanzado.php";
require_once "Model/AlumnosModel.php";
require_once "View/MateriasView.php";
require_once "Helpers/AuthHelper.php";

class AlumnosControlador
{

    private $view;
    private $model;
    private $authHelper;
    public $alumnosPorPaginas= 5;
    private $titulo = "Todas las Materias";

    public function __construct()
    {
        $this->view = new MateriasView();
        $this->model = new AlumnosModel();
        $this->authHelper = new AuthHelper();
    }

    function getAllAlumnos()
    {
        $this->authHelper->comprobarSiHayUsuario();
        $Alumnos = $this->model->getTodosLosAlumnos();
        $Asignatura = $this->authHelper->getTodasLasMaterias();
        $cantidad=$this->getCantidadAlumnos();
        $this->view->MostrarTablaAlumnos($this->titulo, $Alumnos, $Asignatura,  $cantidad);
    }

    function getAlumnosPorAsig()
    {
        $this->authHelper->comprobarSiHayUsuario();

        if (!empty($_POST['select_materia']) && ($_POST['select_materia'] != "Todas")) {
            $Alumnos = $this->model->getAlumnosporAsig($_POST['select_materia']);
            $titulo = "Materia:" . $_POST['select_materia'];
            $Asignatura = $this->authHelper->getTodasLasMaterias();
            $cantidad=0;
            $this->view->MostrarTablaAlumnos($titulo, $Alumnos, $Asignatura,  $cantidad);
        } else {
            $this->view->showTablaAlumnos();
        }
    }

    function insertarAlumno()
    {
        $this->authHelper->comprobarSiHayUsuario();

        if (
            $_FILES['input_imagen']['type'] == "image/jpg" || $_FILES['input_imagen']['type'] == "image/jpeg" ||
            $_FILES['input_imagen']['type'] == "image/png" && !empty($_POST['select_materia'])
            && !empty($_POST['input_calificacion']) && !empty($_POST['input_conducta']) && !empty($_POST['input_email']) &&
            !empty($_POST['input_alumno'])
        ) {

            $this->model->InsertarAlumno($_POST['input_alumno'], $_POST['input_email'], $_POST['input_conducta'], $_POST['input_calificacion'], $_POST['select_materia'], $_FILES["input_imagen"]["tmp_name"]);
            $this->view->showTablaAlumnos();
        } else {

            $this->model->InsertarAlumno($_POST['input_alumno'], $_POST['input_email'], $_POST['input_conducta'], $_POST['input_calificacion'], $_POST['select_materia'], null);
            $this->view->showTablaAlumnos();
        }
    }

    function borrarImagen($params = null)
    {

        $this->authHelper->comprobarSiHayUsuario();
        $id_detalle = $params[':ID'];
        $alumno = $this->model->MostrarAlumno($id_detalle);
        $imagen = $alumno->imagen;

        if ($this->model->deleteImagen($id_detalle) != 0) {

            unlink($imagen);
        }

        $this->view->showTablaAlumnos();
    }
    function tablaAlumnos()
    {
        $this->authHelper->comprobarSiHayUsuario();
        $cantidad=$this->getCantidadAlumnos();
        $Alumnos = $this->model->getTodosLosAlumnos();
        $Asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->MostrarTablaAlumnos($this->titulo, $Alumnos, $Asignatura, $cantidad);
    }

    function DeleteAlumno($params = null)
    {
        $this->authHelper->comprobarSiHayUsuario();
        $id_alumno = $params[':ID'];
        $this->model->deleteAlumno($id_alumno);
        $this->view->showTablaAlumnos($id_alumno);
    }

    function EditarIdAlumno($params = null)
    {
        $this->authHelper->comprobarSiHayUsuario();
        $id_alumno = $params[':ID'];
        $alumnos = $this->model->getTodosLosAlumnos();
        $alumno = $this->model->getAlumnosPorId($id_alumno);
        $asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->MostrarEditarTablaAlumnos($this->titulo, $alumnos, $id_alumno, $alumno, $asignatura);
    }
    function EditarAlumno()
    {
        $this->authHelper->comprobarSiHayUsuario();
        $id_alumno = $_POST['id_alumno'];
        $alumno = $_POST['edit_alumno'];
        $email = $_POST['edit_email'];
        $conducta = $_POST['edit_conducta'];
        $calificacion = $_POST['edit_calificacion'];
        $materia = $_POST['select_materia'];
        $imagen = $_FILES["input_imagen"]["tmp_name"];
        $this->model->editAlumno($id_alumno, $alumno, $email, $conducta, $calificacion, $materia, $imagen);
        $this->view->showTablaAlumnos();
    }
    function DetalleAlumno($params = null)
    {

        $this->authHelper->comprobarSiHayUsuario();
        $id_detalle = $params[':ID'];
        $alumno = $this->model->MostrarAlumno($id_detalle);
        $this->view->showDetallesAlumno($alumno);
    }
    
    function getPaginacion($params= null)
    {   
        $pos= $params[':ID'];
        $this->authHelper->comprobarSiHayUsuario();
        $cantidad=$this->getCantidadAlumnos();
        $paginas= $cantidad/5;//$alumnosPorPaginas;
        $posFinal=  $pos*5;//$alumnosPorPaginas;
        $pos=$posFinal-5;//$alumnosPorPaginas;

        $alumnos= $this->model->getAlumnosPorPagina($pos);
        $asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->MostrarTablaAlumnos($this->titulo, $alumnos, $asignatura, $paginas);
    }   

    function getCantidadAlumnos(){
        $cantidad=intval($this->model->getCantidadAlumnos());
       return $cantidad;
    }

function getComentariosCSR()
    {

        $this->view->showComentariosCSR();
    }
}