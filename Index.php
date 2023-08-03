<?php
require_once("./Clases/Empleado.php");

$objetoEmpleado = new Empleado('Pedro Pérez', 'pperez@example.com', 'M', 6, 'Hola mundo x2');

$empleado = $objetoEmpleado->getEmpleados();

require_once("./Eliminar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
</head>
<body>
    <h1>Listado de Empleados</h1>
    <a href="Crear.php"><input type="button" value="Crear Empleado"></a>
    <table border="1px" width="800px" height="300px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Sexo</th>
                <th>Area</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleado as $empleados) : ?>
                <tr>
                    <td><?php echo $empleados['id']; ?></td>
                    <td><?php echo $empleados['nombre_empleado']; ?></td>
                    <td><?php echo $empleados['email']; ?></td>
                    <td><?php echo $empleados['sexo']; ?></td>
                    <td><?php echo $empleados['nombre_area']; ?></td>

                    <td><a href="Editar.php?id=<?php echo $empleados['id']; ?>">Editar</a></td>
                    <td><a href="index.php?eliminar=<?php echo $empleados['id']; ?>">Eliminar</a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
