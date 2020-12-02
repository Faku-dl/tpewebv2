<?php



class ComentariosModel
{

    private $db;


    public function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;' . 'dbname=escuela;charset=utf8', 'root', '');
    }


    function deleteComentario($id_comentario = null)
    {
        $sentencia = $this->db->prepare('DELETE FROM comentario WHERE id_comentario=?');
        $sentencia->execute(array($id_comentario));
        return $sentencia->rowCount();
    }
    function getComentarios($nombre_alumno)
    {

        $sentencia = $this->db->prepare('SELECT * FROM comentario WHERE nombre_alumno=? ORDER by id_comentario DESC /*LIMIT 10 LIMIT {someLimit} OFFSET {someOffset}*/');
        $sentencia->execute([$nombre_alumno]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function getComentariosPorId($id_comentario)
    {
        $sentencia = $this->db->prepare('SELECT * FROM comentario WHERE id_comentario=?');
        $sentencia->execute([$id_comentario]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function insertarComentario($nombre_alumno, $contenido, $usuario_nombre, $valoracion_alumno)
    {
        $sentencia = $this->db->prepare('INSERT INTO comentario (nombre_alumno,contenido,usuario_nombre,valoracion_alumno) VALUES(?,?,?,?) ');
        $sentencia->execute(array($nombre_alumno, $contenido, $usuario_nombre, $valoracion_alumno));
    }
}
