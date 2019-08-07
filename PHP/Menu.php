<?php
require "libs/Seguridad.php";
require "libs/Conexion.php";
$seguridad = new Seguridad();
$VAL = "ADMINISTRADOR";
$usuarioEnSesion = $seguridad->getUsuario();

$esAdministrador = mysqli_query($conn, "SELECT * FROM usuarios WHERE Administrador = '$VAL' and nombre_Usuario = '$usuarioEnSesion'");

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
    <title>Menú principal</title>
    <link rel="stylesheet" href="../css/TablaAll.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <style>
        .dropbt {
            color: black;
            padding: 16px;
            cursor: pointer;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            color: blue;

        }

        .dropcont {
            position: absolute;
            display: none;
            min-width: 160px;
            z-index: 1;
            background-color: white;
        }

        .dropcont a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropcont {
            display: block;
        }

        #navegacion {
            background: rgb(213, 250, 240);
            background: linear-gradient(90deg, rgba(213, 250, 240, 1) 0%, rgba(144, 232, 168, 0.8989247311827957) 50%, rgba(148, 209, 222, 1) 100%);
            position: relative;
            border-radius: 5px;
            padding: 10px;

        }
    </style>
</head>

<body style="background-color: #d9f2d9; padding:3%">
    <h1 style="text-align: center">Menú principal</h1>

    <?php

    $user = $_SESSION['usuario'];

    $hora = time();
    echo "<h5 style='background-color: aqua; border-radius:5px;   padding: 10px;'>" . "Bienvenid@: \n" . $user . "</h5>";
    ?>
    <nav id="navegacion" class="navbar">
        <?php
        if ($esAdministrador->num_rows > 0) {

            echo '   <button onclick="redirAgregar()" class="btn btn-primary">Agregar equipo</button>';
        } else {
            //echo $hora;
        }

        ?>

        <button onclick="redirBuscar()" class="btn btn-primary">Buscar Equipo</button>


    </nav>
    <?php

    require "Consultas.php";

    if (!$esAdministrador->num_rows > 0) {
        ConsultarSinAcciones($conn);
    } else {
        consultarTodo($conn);
    }


    ?>

    <form action="libs/CerrarSesion.php" method="post">
        <button class="btn btn-danger">Cerrar Sesión</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/datos.js"></script>

    <script type="text/javascript">
        function redirAgregar() {
            window.location = "AgregarEquipos.php";
        }

        function redirBuscar() {
            window.location = "Buscar.php";
        }
    </script>
</body>

</html>