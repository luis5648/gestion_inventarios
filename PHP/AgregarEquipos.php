<?php
require "libs/Seguridad.php";
require "libs/Conexion.php";
require "Consultas.php";
$seguridad = new Seguridad();
$usuarioEnSesion = $seguridad->getUsuario();
if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
    exit;
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar equipos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/TablaAll.css">
    <style type="text/css">
        div {

            background-color: #e6f7ff;
        }

        button {
            padding: 10px;
            margin: 20px;

        }

        #mainForm {

            Margin: 2%;
            padding: 10%;

        }
    </style>
</head>

<body style="background-color: #e6f7ff ">
    <div style="background-color: white">
        <h2>Agregar equipo.</h2>
    </div>
    <div>

        <form action="" method="post" id="mainForm">
            <div id="form1">

                <label class="form-control" style="background-color: #e6f7ff ">ID del equipo:</label>
                <input type="text" name="id_equipo" class="form-control"><br>

                <label class="form-control" style="background-color: #e6f7ff ">Nombre (Descripción del equipo):</label>
                <input type="text" name="nombre_equipo" class="form-control" required><br>


                <label class="form-control" style="background-color: #e6f7ff ">Marca:</label>
                <input type="text" name="marca" class="form-control" required><br>


                <label class="form-control" style="background-color: #e6f7ff ">Descripción de la falla en el equipo: </label>
                <input type="text" name="modelo" class="form-control" autocomplete="off" required><br>


                <label class="form-control" style="background-color: #e6f7ff ">Persona que entrega el equipo: </label>
                <input type="text" name="no_serie" class="form-control" required><br>


                <label class="form-control" style="background-color: #e6f7ff ">Teléfono: </label>
                <input type="text" name="telefono" class="form-control" required onkeypress="return event.charCode >= 48 && event.charCode <= 57"><br>


                <label class="form-control" style="background-color: #e6f7ff ">Procedencia: </label>
                <input type="text" name="ubicacion" class="form-control" required><br>


                <label for="persona">Nombre de la persona que entrega</label>
                <input type="text" name="persona" class="form-control" id="personaInput">


                <button class="btn btn-success" name="addI">Agregar</button>
                <a href="Menu.php" class="btn btn-secondary">Regresar</a>


            </div>
        </form>


    </div>
    <hr>
    <?php

    if (isset($_POST["addI"])) {

        $nombreEquipo = $_POST["nombre_equipo"];
        $falla = $_POST["modelo"];
        $entrega = $_POST["no_serie"];
        $Telefono = $_POST["telefono"];
        $ubicacionEquipo = $_POST["ubicacion"];
        $STATUS = "PENDIENTE";


        $sqlNuevoEquipo = "INSERT INTO EQUIPOS(EQUIPO_DESCRIPCION, EQUIPO_PROBLEMA, EQUIPO_PERSONA_ENTREGA, EQUIPO_UCTA_RECIBE, EQUIPO_TELEFONO_PERSONA, EQUIPO_PROCEDENCIA, ESTADO, EQUIPO_FECHA)  
VALUES ('$nombreEquipo','$falla','$entrega','$usuarioEnSesion','$Telefono','$ubicacionEquipo','$STATUS', NOW()) ";

        if ($conn->query($sqlNuevoEquipo) === TRUE) {
            echo "<script>
                    alert('Nuevo equipo agregado!'); 
                    window.location= 'Menu.php';

                  </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
    // consultarTodo($conn);

    // valida solo numeros en los campos:
    //onkeypress='return event.charCode >= 48 && event.charCode <= 57'
    ?>
</body>

</html>