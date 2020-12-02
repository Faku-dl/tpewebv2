<?php 

require_once 'ViewApi.php';


abstract class ApiController {
    protected $alumnosModel;
    protected $comentariosModel;
    protected $view;
    private $data; 

    public function __construct() {
        $this->view = new ViewApi();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
}
