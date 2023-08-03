<?php

require_once("./conexion/Conexion.php");

class Rol extends ConexionBD {
    protected $id;
    protected $nombre;

    public function getRol() {
        $sql = "SELECT * FROM roles";
        $execute = $this->ObtenerConexion()->query($sql);
        $request = $execute->fetchAll(PDO::FETCH_ASSOC);
        return $request;
    }
}

?>


