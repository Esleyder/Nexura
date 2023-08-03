<?php
require_once("./Conexion/Conexion.php");
 
class Empleado extends ConexionBD{
private $nombre_empleado;
private $email;
private $sexo;
private $area_id;
//private $boletin;
private $descripcion;

public function __construct($nombre_empleado,$email,$sexo,$area_id,$descripcion){
parent::__construct();

$this->nombre_empleado=$nombre_empleado;
$this->email=$email;
$this->sexo=$sexo;
$this->area_id=$area_id;
//$this->boletin=$boletin;
$this->descripcion=$descripcion;
}

public function getEmpleados() {
    $sql = "SELECT e.id, e.nombre_empleado, e.email, e.sexo, a.nombre AS nombre_area
            FROM empleado e, areas a
            WHERE e.area_id = a.id";
    $execute = $this->ObtenerConexion()->query($sql);
    $request = $execute->fetchAll(PDO::FETCH_ASSOC);
    return $request;
}


public function insertarEmpleado() {
    $sql = "INSERT INTO empleado (nombre_empleado,email,sexo,area_id,descripcion) VALUES (?,?,?,?,?)";
    $insert = $this->obtenerConexion()->prepare($sql);
    $parametros = array($this->nombre_empleado,$this->email,$this->sexo,$this->area_id,$this->descripcion);
    $resInsert = $insert->execute($parametros);
    $idInsert = $this->ObtenerConexion()->lastInsertId();
    return $idInsert;
}


public function eliminarEmpleado($id) {
    $sql = "DELETE FROM empleado WHERE id = ?";
    $delete = $this->obtenerConexion()->prepare($sql);
    $parametros = array($id);
    $resDelete = $delete->execute($parametros);
    return $resDelete;
}

public function getEmpleadoPorID($id) {
    $sql = "SELECT * FROM empleado WHERE id = ?";
    $query = $this->obtenerConexion()->prepare($sql);
    $query->execute(array($id));
    $empleado = $query->fetch(PDO::FETCH_ASSOC);
    return $empleado;
}

public function actualizarEmpleado($id) {
    $sql = "UPDATE empleado SET nombre_empleado = ?, email = ?, sexo = ?, area_id = ?, descripcion = ? WHERE id = ?";
    $update = $this->obtenerConexion()->prepare($sql);
    $parametros = array($this->nombre_empleado, $this->email, $this->sexo, $this->area_id, $this->descripcion, $id);
    $resUpdate = $update->execute($parametros);
    return $resUpdate;
}








 
}
?>