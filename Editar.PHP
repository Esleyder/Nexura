<?php
require_once("./Clases/Empleado.php");
require_once("./Clases/Area.php");
$objetoArea =new Area();
 

$area = $objetoArea->getAreas();



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editar_empleado"])) {
    // Obtener los datos del formulario de edición
    $id = $_POST["editar_empleado"];
    $nombre_empleado = $_POST["nombre_empleado"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    $area_id = $_POST["area_id"];
    $descripcion = $_POST["descripcion"];

    // Crear objeto Empleado y actualizar los datos
    $objetoEmpleado = new Empleado($nombre_empleado, $email, $sexo, $area_id, $descripcion);
    $resUpdate = $objetoEmpleado->actualizarEmpleado($id);

    if ($resUpdate) {
        echo "Empleado actualizado con éxito.";
        header("Location: index.php");
        exit; // Importante: asegúrate de salir del script después de la redirección
    } else {
        echo "Error al actualizar el empleado.";
    }
}

if (isset($_GET["id"])) {
    // Obtener el ID del empleado a editar
    $idEmpleado = $_GET["id"];

    // Crear objeto Empleado y obtener los datos del empleado
    $objetoEmpleado = new Empleado('', '', '', '', '');
    $empleado = $objetoEmpleado->getEmpleadoPorID($idEmpleado);

    // Verificar si se encontró el empleado
    if ($empleado) {
        $nombre_empleado = $empleado['nombre_empleado'];
        $email = $empleado['email'];
        $sexo = $empleado['sexo'];
        $area_id = $empleado['area_id'];
        $descripcion = $empleado['descripcion'];
    } else {
        echo "Empleado no encontrado.";
        exit;
    }
} else {
    echo "ID de empleado no especificado.";
    exit;
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
         <p><input type="hidden" name="editar_empleado" value="<?php echo $idEmpleado; ?>"></p>
         <p>Nombre Completo *<input type="text" name="nombre_empleado" size="40" value="<?php echo $nombre_empleado;?>"></p>

         <p>Correo electonico *<input type="email" name="email" size="40" value="<?php echo $email; ?>"></p>

         <p>Sexo
        <input type="radio" name="sexo" value="Masculino" <?php if ($sexo === 'Masculino') echo 'checked'; ?>>M
        <input type="radio" name="sexo" value="Femenino" <?php if ($sexo === 'Femenino') echo 'checked'; ?>>F
        </p>

        <p>Area
    <select name="area_id">
        <?php foreach ($area as $areas) : ?>
            <option value="<?php echo $areas['id']; ?>" <?php if ($areas['id'] === $area_id) echo 'selected'; ?>><?php echo $areas['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
</p>

<p><textarea name="descripcion" rows="4" cols="50" placeholder="Escribe un comentario"><?php echo $descripcion; ?></textarea></p>
     
    <p><input type="submit" value="Guardar"></p>

         </form>
         <a href="index.php">Volver</a>
</fieldset>
    
</body>
</html>
