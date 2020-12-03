<?php
require_once "./RouterAvanzado.php";
require_once "Model/MateriaModel.php";
require_once "View/MateriasView.php";
require_once "Helpers/AuthHelper.php";

 class MateriasControlador
{

    private $view;
    private $model;
    private $Titulo = "Todas las Materias";
    private $authHelper;

    public function __construct()
    {
        $this->view = new MateriasView();
        $this->model = new MateriaModel();
        $this->authHelper = new AuthHelper();
    }

    function getAll()
    {
        $this->authHelper->comprobarSiHayUsuario();
        $Asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->mostrarTablaMateria($this->Titulo, $Asignatura);
    }

    function getMateriasPorAsig()
    {
        $this->authHelper->comprobarSiHayUsuario();
        if ($_GET['select_materia'] != "Todas") {
            $Asignatura = $this->model->getMateriasPorAsig($_GET['select_materia']);
            $this->view->mostrarTablaMateria($this->Titulo, $Asignatura);
        } else {
            $this->view->showTablaMaterias();
        }
    }
    function insertarMateria()
    {
        $this->authHelper->comprobarSiHayUsuario();
        
        $this->model->insertarMateria($_POST['input_materia'], $_POST['input_profesor'], $_POST['input_curso']);
        $this->view->showTablaMaterias();
    }
    function tablaMaterias()
    {
        $this->authHelper->comprobarSiHayUsuario();
        $this->Asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->mostrarTablaMateria($this->Titulo, $this->Asignatura);
    }
    function home()
    {
        $this->authHelper->comprobarSiHayUsuario();
        $this->view->mostrarHome();
    }
    function deleteMateria($params = null)
    {

        $id_materia = $params[':ID'];
        $this->model->deleteMateria($id_materia);
        $this->view->showTablaMaterias($id_materia);
    }

    function editarID($params = null)
    {
        $id_materia = $params[':ID'];
        $Asignatura = $this->authHelper->getTodasLasMaterias();
        $this->view->mostrarEditarTabla($this->Titulo, $Asignatura, $id_materia);
    }
    function editarMateria()
    {   
        $id_materia = $_POST['id_materia'];
        $materia = $_POST['edit_materia'];
        $profesor = $_POST['edit_profesor'];
        $curso = $_POST['edit_curso'];

        $this->model->editMateria($id_materia, $materia, $profesor, $curso);
        $this->view->showTablaMaterias();
    }
    function detalleMateria($params = null)
    {
        $id_detalle = $params[':ID'];
        $asignatura = $this->model->MostrarMateria($id_detalle);
        $this->view->showDetalles($asignatura);
    }

}
