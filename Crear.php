<?php
require_once("./Conexion/Conexion.php");
require_once("./Clases/Empleado.php");
require_once("./Clases/Area.php");
require_once("./Clases/Rol.php");
$objetoArea =new Area();
$objetoRol = new Rol();
$roles = $objetoRol->getRol();

$area = $objetoArea->getAreas();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperamos los datos del formulario
    $nombre_empleado = $_POST["nombre_empleado"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    $area_id = $_POST["area_id"];
    $descripcion = $_POST["descripcion"];

    // Creamos un objeto Empleado
    $empleado = new Empleado($nombre_empleado, $email, $sexo, $area_id, $descripcion);

    // Insertamos el empleado en la base de datos
    $idInsertado = $empleado->insertarEmpleado();

    // Si todo fue exitoso, puedes redirigir al usuario a una página de éxito o mostrar un mensaje
    // Por ejemplo:
    if ($idInsertado) {
        echo "Empleado insertado correctamente con el ID: " . $idInsertado;
        header("Location: index.php");
    } else {
        echo "Error al insertar el empleado en la base de datos.";
    }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<fieldset>
         <legend>Formulario Empleado</legend>

         <form action="#" method="post">
         <p>Nombre Completo *<input type="text" name="nombre_empleado" size="40"></p>

         <p>Correo electonico *<input type="email" name="email" size="40"></p>

         <p>Sexo<input type="radio" name="sexo" value="Masculino">M
         <input type="radio" name="sexo" value="Femenino">F</p>

        <p>Area<select name="area_id"  required>
                <?php foreach ($area as $areas) : ?>
                    <option value="<?php  echo $areas['id']; ?>"><?php echo $areas['nombre']; ?></option>
                <?php endforeach; ?>
        </select></p>

           
        <p><textarea name="descripcion"  rows="4" cols="50" placeholder="Escribe un comentario"></textarea></p>

        <p>Roles:</p>
        <?php foreach ($roles as $rol) : ?>
            <label>
                <input type="checkbox" name="roles[]" value="<?php echo $rol['id']; ?>">
                <?php echo $rol['nombre']; ?>
            </label>
            <br>
        <?php endforeach; ?>
  
    <p><input type="submit" value="Guardar"></p>

         </form>
         <a href="index.php">Volver</a>
</fieldset>
    
</body>
</html>