<?php
require_once "./RouterAvanzado.php";
require_once "Model/AlumnosModel.php";
require_once "View/AlumnosView.php";
require_once "Helpers/AuthHelper.php";

class AlumnosControlador
{

    private $view;
    private $model;
    private $authHelper;
    private $alumnosPorPaginas;
    private $titulo;

    public function __construct()
    {
        $this->view = new AlumnosView();
        $this->model = new AlumnosModel();
        $this->authHelper = new AuthHelper();
        $this->alumnosPorPaginas= 5;
        $this->titulo = "Todas las Materias";
    }

    function getAllAlumnos()
    {
        $this->authHelper->comprobarSiHayUsuario();
        $Alumnos = $this->model->getTodosLosAlumnos();
        $Asignatura = $this->authHelper->getTodasLasMaterias();
        $cantidad = $this->getCantidadAlumnos();
        $this->view->MostrarTablaAlumnos($this->titulo, $Alumnos, $Asignatura,  $cantidad);
    }

    function getAlumnosPorAsig()
    {
        $this->authHelper->comprobarSiHayUsuario();

        if (!empty($_POST['select_materia']) && ($_POST['select_materia'] != "Todas")) {
            $Alumnos = $this->model->getAlumnosporAsig($_POST['select_materia']);
            $titulo = "Materia:" . $_POST['select_materia'];
            $Asignatura = $this->authHelper->getTodasLasMaterias();
            $cantidad = 0;
            $this->view->MostrarTablaAlumnos($titulo, $Alumnos, $Asignatura,  $cantidad);
        } else {
            $this->view->showTablaAlumnos();
        }
    }

    function insertarAlumno()
    {
        $this->authHelper->comprobarSiHayUsuario();
        if (
            !empty($_POST['input_alumno']) && !empty($_POST['input_email']) && !empty($_POST['input_conducta']) && !empty($_POST['input_calificacion']) &&
            !empty($_POST['select_materia']) && !empty($_FILES["input_imagen"]["tmp_name"])
        ) {

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
        } else {
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
        $cantidad = $this->getCantidadAlumnos();
        $Alumnos = $this->model->getTodosLosAlumnos();
        $Asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->mostrarTablaAlumnos($this->titulo, $Alumnos, $Asignatura, $cantidad);
    }

    function deleteAlumno($params = null)
    {
        $this->authHelper->comprobarSiHayUsuario();
        $id_alumno = $params[':ID'];
        $this->model->deleteAlumno($id_alumno);
        $this->view->showTablaAlumnos($id_alumno);
    }

    function editarIdAlumno($params = null)
    {
        $this->authHelper->comprobarSiHayUsuario();
        $id_alumno = $params[':ID'];
        $alumnos = $this->model->getTodosLosAlumnos();
        $alumno = $this->model->getAlumnosPorId($id_alumno);
        $asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->mostrarEditarTablaAlumnos($this->titulo, $alumnos, $id_alumno, $alumno, $asignatura);
    }
    function editarAlumno()
    {
        $this->authHelper->comprobarSiHayUsuario();
        if (
            !empty($_POST['input_alumno']) && !empty($_POST['input_email']) && !empty($_POST['input_conducta']) && !empty($_POST['input_calificacion']) &&
            !empty($_POST['select_materia']) && !empty($_FILES["input_imagen"]["tmp_name"])
        ) {
            $id_alumno = $_POST['id_alumno'];
            $alumno = $_POST['edit_alumno'];
            $email = $_POST['edit_email'];
            $conducta = $_POST['edit_conducta'];
            $calificacion = $_POST['edit_calificacion'];
            $materia = $_POST['select_materia'];
            $imagen = $_FILES["input_imagen"]["tmp_name"];
            $this->model->editAlumno($id_alumno, $alumno, $email, $conducta, $calificacion, $materia, $imagen);
            $this->view->showTablaAlumnos();
        }else{
            $this->view->showTablaAlumnos();
        }
    }
    function detalleAlumno($params = null)
    {

        $this->authHelper->comprobarSiHayUsuario();
        $id_detalle = $params[':ID'];
        $alumno = $this->model->mostrarAlumno($id_detalle);
        $this->view->showDetallesAlumno($alumno);
    }

    function getPaginacion($params = null)
    {
        $pos = $params[':ID'];
        $this->authHelper->comprobarSiHayUsuario();
        $cantidad = $this->getCantidadAlumnos();
        $paginas = $cantidad / $this->alumnosPorPaginas;
        $posFinal =  $pos * $this->alumnosPorPaginas;
        $pos = $posFinal - $this->alumnosPorPaginas;

        $alumnos = $this->model->getAlumnosPorPagina($pos);
        $asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->mostrarTablaAlumnos($this->titulo, $alumnos, $asignatura, $paginas);
    }

    private function getCantidadAlumnos()
    {
        $cantidad = intval($this->model->getCantidadAlumnos());
        return $cantidad;
    }

    function getComentariosCSR()
    {

        $this->view->showComentariosCSR();
    }
}
