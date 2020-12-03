<?php



class AlumnosModel
{

    private $db;


    public function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;' . 'dbname=escuela;charset=utf8', 'root', '');
    }
    
    function getTodosLosAlumnos()
    {

        $sentencia = $this->db->prepare('SELECT * FROM alumno ORDER BY nombre_alumno ASC');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getAlumnosporAsig($Asignatura)
    {
        $sentencia = $this->db->prepare('SELECT * FROM alumno WHERE materia=? ORDER BY nombre_alumno ASC');
        $sentencia->execute([$Asignatura]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getAlumnosporNombre($alumno)
    {
        $sentencia = $this->db->prepare('SELECT * FROM alumno WHERE nombre_alumno=? ORDER BY nombre_alumno ASC');
        $sentencia->execute([$alumno]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function getAlumnosporEmail($alumno, $email)
    {
        $sentencia = $this->db->prepare('SELECT * FROM alumno WHERE nombre_alumno=?, email=? ORDER BY nombre_alumno ASC');
        $sentencia->execute([$alumno, $email]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function getAlumnosPorId($idAlumno)
    {       
        $sentencia = $this->db->prepare('SELECT * FROM alumno WHERE id_alumno=?');
        $sentencia->execute([$idAlumno]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function insertarAlumno($alumno, $email, $conducta,$calificacion,$materia,$filePath=null)
    { 
     
        $direccion = null;
       if ($filePath!=null){
           $direccion = $this->subirImagen($filePath);
    }
        $sentencia = $this->db->prepare('INSERT INTO alumno (nombre_alumno,email,conducta,calificacion, materia, imagen) VALUES(?,?,?,?,?,?) ');
        $sentencia->execute(array($alumno, $email, $conducta,$calificacion,$materia, $direccion));
    }
    function deleteAlumno($id_alumno = null)
    {
        $sentencia = $this->db->prepare('DELETE FROM alumno WHERE id_alumno=?');
        $sentencia->execute(array($id_alumno));
        return $sentencia->rowCount();
    }
    function editAlumno($id_alumno, $alumno, $email,$conducta,$calificacion, $materia,$filePath=null)
    {
    
        $direccion = null;
       if ($filePath!=null){
           $direccion = $this->subirImagen($filePath);
    }
        $sentencia = $this->db->prepare('UPDATE alumno  SET nombre_alumno=?, email=?, conducta=?, calificacion=?, materia=?, imagen=? WHERE id_alumno=?');
        $sentencia->execute(array($alumno, $email,$conducta,$calificacion, $materia,$direccion,$id_alumno));
        return $sentencia->rowCount();
    }

    function mostrarAlumno($id_alumno)
    {
        $sentencia = $this->db->prepare('SELECT * FROM alumno INNER JOIN materia ON alumno.materia=materia.nombre_materia WHERE id_alumno=?');
        $sentencia->execute([$id_alumno]);
        return $sentencia->fetch(PDO::FETCH_OBJ);

    }

    private function subirImagen($imagen){
        $lugar = "imgs/" . uniqid() . '.jpeg';
        move_uploaded_file($imagen, $lugar);
        return $lugar;
    }
    public function deleteImagen($id_alumno){

        $sentencia = $this->db->prepare("UPDATE alumno SET imagen = null WHERE id_alumno=?");
        $sentencia->execute([$id_alumno]);
        return $sentencia->rowCount();
    }
    public function getAlumnosporBusquedaCompleta($alumno, $email,$conducta,$calificacion, $materia){

        $sentencia = $this->db->prepare('SELECT * FROM alumno WHERE nombre_alumno=?, email=?, conducta=?, calificacion=?, materia=? ORDER BY nombre_alumno ASC');
        $sentencia->execute([$alumno, $email,$conducta,$calificacion, $materia]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getCantidadAlumnos(){
        $sentencia = $this->db->prepare('SELECT COUNT(*)  as cantidad FROM alumno');
        $sentencia->execute();
        $resultado=$sentencia->fetch(PDO::FETCH_ASSOC);
        return $resultado['cantidad'];
    }

    function getAlumnosPorPagina($pos)
    {
        $sentencia = $this->db->prepare("SELECT * FROM alumno LIMIT 5 OFFSET $pos ");
        $sentencia->execute([$pos]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}