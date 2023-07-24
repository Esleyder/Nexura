<?php
//creo la Clase Conexion
class ConexionBD{
//atributo protected
protected $conexion;

public function __construct(){
    try{
    $this->conexion=new PDO('mysql:host=localhost;dbname=prueba_tecnica_dev','root','');
    $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    }catch(PDOException $e){
        echo "Error de conexión: " . $e->getMessage();
    }
}

public function ObtenerConexion(){
    return $this->conexion;
}

}
?>