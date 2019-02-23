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
<h3 style="margin-left: 5%; margin-top: 2%">Modificar Equipo</h3>
<form action="" method="post" style="padding: 10%;text-align: center;" class="form-group">
    <label for="" class="form-control" style="background-color: #e6f7ff ">ID Equipo</label>
    <input required type="text" name="id_equipo" class="form-control" value="<?php echo $filas["ID_Equipo"]; ?>"><br>

    <label class="form-control" style="background-color: #e6f7ff ">Nombre (Descripción del equipo):</label>
    <input required type="text" class="form-control" name="nombre_equipo"
           value="<?php echo $filas["Nombre_Equipo"]; ?>"><br>

    <label class="form-control" style="background-color: #e6f7ff ">Modelo:</label>
    <input required type="text" name="modelo" class="form-control" value="<?php echo $filas["Modelo"]; ?>"><br>

    <label class="form-control" style="background-color: #e6f7ff ">Marca:</label>
    <input required type="text" class="form-control" name="marca" value="<?php echo $filas["Marca"]; ?>"><br>

    <label class="form-control" style="background-color: #e6f7ff ">No. serie:</label>
    <input required class="form-control" type="text" name="no_serie"
           onkeypress='return event.charCode >= 48 && event.charCode <= 57'
           value="<?php echo $filas["N_serie"]; ?>"><br>

    <label class="form-control" style="background-color: #e6f7ff ">Ubicacion:</label>
    <input required class="form-control" type="text" name="ubicacion" value="<?php echo $filas["Ubicacion"]; ?>"><br>

    <label class="form-control" style="background-color: #e6f7ff ">Nombre del propietario: </label>
    <select name="BuscaPropietario" id="SelProp" class="form-control">
        <?php
        $qProp = "SELECT Nombre_Propietario FROM propietario";
        $res = $conn->query($qProp);

        if ($res->num_rows > 0) {
            while ($filas = $res->fetch_assoc()) {

                echo "<option value='$filas[Nombre_Propietario]'> $filas[Nombre_Propietario]</option>";

            }


        }

        ?>
    </select>

    <br>

    <label for="" class="form-control" style="background-color: #e6f7ff ">Categoría</label>
    <select name="BuscaCategoria" id="SelCategoria" class="form-control">
        <?php
        $qCat = "SELECT Nombre_Categoria FROM categoria";
        $res = $conn->query($qCat);

        if ($res->num_rows > 0) {
            while ($filas = $res->fetch_assoc()) {

                echo "<option value='$filas[Nombre_Categoria]'> $filas[Nombre_Categoria]</option>";
            }


        }


        echo "</select>";

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
    $nuevCat = $_POST["BuscaCategoria"];
    $nuevProp = $_POST["BuscaPropietario"];


    //validación de las llaves foraneas
    $numCat = mysqli_query($conn, "SELECT ID_Categoria FROM categoria WHERE Nombre_Categoria ='$nuevCat'");
    $numPropt = mysqli_query($conn, "SELECT ID_Propietario FROM propietario WHERE Nombre_Propietario ='$nuevProp'");

    $c = $numCat->fetch_assoc();
    $p = $numPropt->fetch_assoc();


//actualización de datos
    $sqlActualizar = "UPDATE equipos SET ID_Equipo='$idNuev', Nombre_Equipo='$nombNuev',
                   Modelo='$modNuev', Marca='$marcNuev', N_serie='$serNuev',
                   Ubicacion='$ubNuev', ID_Categoria='$c[ID_Categoria]',ID_Propietario='$p[ID_Propietario]' WHERE ID_Equipo = '$id'";

    if (!$conn->query($sqlActualizar)) {
        echo "<script>alert('Hubo un error al actualizar.');</script>";

    } else {
        echo "<script>alert('Equipo Actualizado!');</script>";
    }
}
consultarSinAcciones($conn);

?>

</body>
</html>
