<?php
 require_once("Conexion.php");
class Area extends ConexionBD{
private $id;
private $nombre;
 

public function getAreas() {
    $sql = "SELECT * FROM areas";
    $execute = $this->ObtenerConexion()->query($sql);
    $request = $execute->fetchAll(PDO::FETCH_ASSOC);
    return $request;
}


}


?>