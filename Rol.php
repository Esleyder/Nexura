<?php

require_once("Conexion.php");

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

$objetoRol = new Rol();
$rol = $objetoRol->getRol();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="">
        <?php foreach ($rol as $roles) : ?>
            <label>
                <input type="checkbox" name="rol_i[]" value="<?php echo $roles['id']; ?>">
                <?php echo $roles['nombre']; ?>
            </label>
            <br>
        <?php endforeach; ?>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
