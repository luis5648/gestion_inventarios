<?php
require "libs/Seguridad.php";
require "libs/Conexion.php";

$seguridad = new Seguridad();
$VAL = "ADMINISTRADOR";
$usuarioEnSesion = $seguridad->getUsuario();

if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
    exit;
}


$idEquipo = base64_decode($_GET['y']);
echo $idEquipo;

$consultaEquipos = mysqli_query($conn, "SELECT * FROM EQUIPOS WHERE ID_EQUIPO = '$idEquipo'");
$filas = $consultaEquipos->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipos resueltos</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">

</head>

<body>
    <form action="" method="post" style="padding: 10%;text-align: center;" class="form-group">
        <!-- <label for="" class="form-control" style="background-color: #e6f7ff ">ID Equipo</label>
        <input required type="text" name="id_equipo" class="form-control" value="<?php //echo $filas["ID_EQUIPO"]; 
                                                                                    ?>"><br> -->

        <label class="form-control" style="background-color: #e6f7ff ">Nombre (Descripción del equipo):</label>
        <input required type="text" class="form-control" name="nombre_equipo" value="<?php echo $filas["EQUIPO_DESCRIPCION"]; ?>" disabled><br>

        <label class="form-control" style="background-color: #e6f7ff ">Descripción de la falla en el equipo:</label>
        <input required type="text" name="problema" class="form-control" value="<?php echo $filas["EQUIPO_PROBLEMA"]; ?>" disabled><br>



        <label class="form-control" style="background-color: #e6f7ff ">Persona que entrega el equipo:</label>
        <input required class="form-control" type="text" name="entregaCTA" value="<?php echo $usuarioEnSesion; ?>" disabled> <br>

        <label class="form-control" style="background-color: #e6f7ff ">Persona que recibe el equipo:</label>
        <input required type="text" class="form-control" name="recibePersona" value="" required<br>

        <label class="form-control" style="background-color: #e6f7ff ">Diagnóstico:</label>
        <textarea required class="form-control" type="text" name="Diag" required></textarea><br>


        <br><br><button class='btn btn-secondary' name='Actualizar'>Aceptar</button>
        <a href="Menu.php" class="btn btn-success">Regresar</a>

    </form>

    <?php

    if (isset($_POST['Actualizar'])) {
        $diagnostico = $_POST['Diag'];
        $recibe = $_POST['recibePersona'];
        $status = "RESUELTO";

         $actualizarStatus = mysqli_query($conn,"UPDATE EQUIPOS SET STATUS = '$status' WHERE ID_EQUIPO = '$idEquipo'");

        $insertarResueltos = "INSERT INTO EQUIPOS_LISTOS(ID_EQUIPO, DIAGNOSTICO, UCTA_ENTREGA, PERSONA_RECIBE) VALUES ('$idEquipo','$diagnostico','$usuarioEnSesion','$recibe')";

        if (($conn->query($insertarResueltos)) && $actualizarStatus) {
            echo ' <script>
            alert("Equipo Actualizado! Ha pasado a la lista de equipos reparados");
            window.location = "Menu.php";
            </script>';
            
        } else {
            echo mysqli_error($conn);
            // echo ' <script>alert("ha ocurrido un error al actualizar");</script>';
        }
    }



    ?>

</body>

</html>