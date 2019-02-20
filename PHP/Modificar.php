<?php
require "libs/Conexion.php";
require "libs/Seguridad.php";

$seguridad = new Seguridad();

if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
    exit;
}

$id = $_GET["id"];

$_SESSION['id'] = $id;
$consulta = "SELECT * FROM equipos WHERE ID_Equipo='$id'";
$res = $conn->query($consulta);
$filas = $res->fetch_assoc();

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/TablaAll.css">
    <title>Modificar equipo</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<form action="" method="post">
    <p>ID:</p>
    <input type="text" name="id_equipo" value="<?php echo $filas["ID_Equipo"]; ?>">
    <p>Nombre (Descripción del equipo):</p>
    <input type="text" name="nombre_equipo" value="<?php echo $filas["Nombre_Equipo"]; ?>">
    <p>Modelo:</p>
    <input type="text" name="modelo" value="<?php echo $filas["Modelo"]; ?>">
    <p>Marca:</p>
    <input type="text" name="marca" value="<?php echo $filas["Marca"]; ?>">
    <p>No. serie:</p>
    <input type="text" name="no_serie" value="<?php echo $filas["N_serie"]; ?>">
    <p>Ubicacion:</p>
    <input type="text" name="ubicacion" value="<?php echo $filas["Ubicacion"]; ?>">

    <p>Categoria: </p>
    <input type="text" name="Categoria" list="url_listaC">
    <datalist id="url_listaC">
        <?php

        $sqlCat = "SELECT Nombre_Categoria FROM categoria";
        $sqlProp = "SELECT Nombre_Propietario FROM propietario";

        $resProp = $conn->query($sqlProp);
        $resCat = $conn->query($sqlCat);

        if ($resCat->num_rows > 0) {
            while ($cat = $resCat->fetch_assoc()) {
                echo "<option label=" . $cat["Nombre_Categoria"] . " value=" .
                    $cat["Nombre_Categoria"] . "></option>";
            }
        }
        echo "</datalist>";

        echo "<p>Propietario: </p>";

        echo "<input type = 'text' name = 'Propietario' list = 'url_listaP' >";
        echo "<datalist id = 'url_listaP' >";

        if ($resProp->num_rows > 0) {
            while ($prop = $resProp->fetch_assoc()) {
                echo "<option label=" . $prop["Nombre_Propietario"] . " value=" .
                    $prop["Nombre_Propietario"] . "></option>";
            }
        }
        echo "</datalist>";

        echo "<br><br><button class='btn btn-secondary' name='Actualizar'>Actualizar</button>";
        ?>
        <a href="Menu.php" class="btn btn-success">Regresar</a>
</form>



<?php
require "Consultas.php";
//consultas para actualización
if (isset($_POST["Actualizar"])) {
    $idNuev = $_POST["id_equipo"];
    $nombNuev = $_POST["nombre_equipo"];
    $modNuev = $_POST["modelo"];
    $marcNuev = $_POST["marca"];
    $serNuev = $_POST["no_serie"];
    $ubNuev = $_POST["ubicacion"];
    $nuevCat = $_POST["Categoria"];
    $nuevProp = $_POST["Propietario"];

    $numCat = "SELECT ID_Categoria FROM categoria WHERE Nombre_Categoria ='$nuevCat'";
    $numPropt = "SELECT ID_Propietario FROM propietario WHERE Nombre_Propietario ='$nuevProp'";

    $c = ($conn->query($numCat))->fetch_assoc();
    $p = ($conn->query($numPropt)->fetch_assoc());


    $sqlActualizar = "UPDATE equipos SET ID_Equipo='$idNuev', Nombre_Equipo='$nombNuev',
                   Modelo='$modNuev', Marca='$marcNuev', N_serie='$serNuev',
                   Ubicacion='$ubNuev', ID_Categoria='$c[ID_Categoria]',ID_Propietario='$p[ID_Propietario]' WHERE ID_Equipo = '$id'";

    if (!$conn->query($sqlActualizar)) {
        echo "<script>alert('Hubo un error al actualizar. ¿Ha olvidado llenar algún campo? ');</script>";

    } else {
        echo "<script>alert('Equipo Actualizado!');</script>";
    }
}

consultarSinAcciones($conn);

?>

</body>
</html>
