<?php
require "libs/Conexion.php";
require "libs/Seguridad.php";

$seguridad = new Seguridad();

if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
    exit;
}

$id = base64_decode($_GET["w"]);

//$_SESSION['id'] = $id;
$consulta = "SELECT * FROM EQUIPOS WHERE ID_EQUIPO='$id'";
$res = $conn->query($consulta);
$filas = $res->fetch_assoc();

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/TablaAll.css">
    <title>Modificar equipo</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

</head>

<body>
    <h3 style="margin-left: 5%; margin-top: 2%">Modificar Equipo</h3>
    <form action="" method="post" style="padding: 10%;text-align: center;" class="form-group">
        <!-- <label for="" class="form-control" style="background-color: #e6f7ff ">ID Equipo</label>
        <input required type="text" name="id_equipo" class="form-control" value="<?php //echo $filas["ID_EQUIPO"]; ?>"><br> -->

        <label class="form-control" style="background-color: #e6f7ff ">Nombre (Descripción del equipo):</label>
        <input required type="text" class="form-control" name="nombre_equipo" value="<?php echo $filas["EQUIPO_DESCRIPCION"]; ?>"><br>

        <label class="form-control" style="background-color: #e6f7ff ">Descripción de la falla en el equipo:</label>
        <input required type="text" name="modelo" class="form-control" value="<?php echo $filas["EQUIPO_PROBLEMA"]; ?>"><br>

        <label class="form-control" style="background-color: #e6f7ff ">Persona que recibe el equipo:</label>
        <input required type="text" class="form-control" name="marca" value="<?php echo $filas["EQUIPO_UCTA_RECIBE"]; ?>" disabled  ><br>

        <label class="form-control" style="background-color: #e6f7ff ">Persona que entrega el equipo:</label>
        <input required class="form-control" type="text" name="no_serie" value="<?php echo $filas["EQUIPO_PERSONA_ENTREGA"]; ?>"><br>

        <label class="form-control" style="background-color: #e6f7ff ">Telefono:</label>
        <input required class="form-control" type="text" name="telefono" value="<?php echo $filas["EQUIPO_TELEFONO_PERSONA"]; ?>"><br>

        <label class="form-control" style="background-color: #e6f7ff ">Procedencia:</label>
        <input required class="form-control" type="text" name="ubicacion" value="<?php echo $filas["EQUIPO_PROCEDENCIA"]; ?>"><br>

       


        <br><br><button class='btn btn-secondary' name='Actualizar'>Actualizar</button>
        <a href="Menu.php" class="btn btn-success">Regresar</a>

    </form>


    <?php
    require "Consultas.php";


    //consultas para actualización
    if (isset($_POST["Actualizar"])) {
        
        $nombNuev = $_POST["nombre_equipo"];
        $falla = $_POST["modelo"];
       
        $entrega = $_POST["no_serie"];
        $procedencia = $_POST["ubicacion"];
        $telefono = $_POST["telefono"];

        //actualización de datos
        $sqlActualizar = "UPDATE EQUIPOS SET EQUIPO_DESCRIPCION='$nombNuev',
                   EQUIPO_PROBLEMA='$falla',EQUIPO_PERSONA_ENTREGA='$entrega',
                   EQUIPO_PROCEDENCIA='$procedencia', EQUIPO_TELEFONO_PERSONA='$telefono' WHERE ID_EQUIPO = '$id'";

        if (!$conn->query($sqlActualizar)) {
            echo "<script>alert('Hubo un error al actualizar.".mysqli_error($conn)."');</script>";
        } else {
            echo "<script>alert('Equipo Actualizado!');</script>";
        }
    }
    consultarSinAcciones($conn);

    ?>

</body>

</html>