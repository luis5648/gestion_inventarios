<?php
require "libs/Seguridad.php";
require "libs/Conexion.php";
//require "Consultas.php";
$seguridad = new Seguridad();
$VAL = "ADMINISTRADOR";
$usuarioEnSesion = $seguridad->getUsuario();

$esAdministrador = mysqli_query($conn, "SELECT * FROM usuarios WHERE Administrador = '$VAL' and nombre_Usuario = '$usuarioEnSesion'");

if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
    exit;
}

/*
    El objetivo del siguiente código es el de obtener las acciones
    para las tablas (modificar y eliminar) para que se manejen
    mediante código php y no con ajax
*/

function lastRows($conn){
    $acciones = '';

    $stmn = "SELECT * FROM EQUIPOS ";
    $result = $conn->query($stmn);
    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();
        
       // while ($fila = $result->fetch_assoc()) {


            echo  "<td><a href=\"Modificar.php?w=" . base64_encode($fila['ID_EQUIPO']) . "\">Modificar</a> | <a href=\"Eliminar.php?w=" . base64_encode($fila['ID_EQUIPO']) ."\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\">Eliminar</a> | <a href=\"Resueltos.php?y=".base64_encode($fila['ID_EQUIPO'])."\" onClick=\"return confirm('¿Está seguro que desea cambiar el status del equipo a resuelto?')\"> Cambiar status </a></td>";
            //return $acciones;
        //}
    } else {
        $acciones = "No se encontraron equipos en el inventario";
        //return $acciones;
    }
    
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
    <nav id="navegacion" class="navbar navbar-black">
        <?php
        if ($esAdministrador->num_rows > 0) {

            echo '   <button onclick="redirAgregar()" class="btn btn-primary">Agregar equipo</button>';
        } else {
            //echo $hora;
        }

        ?>

        <input type="search" style="width: 50%;" class="form-control" id="buscarEquipo" placeholder="Buscar Equipo">
       


    </nav>
    <br><br>
    <h3>Equipos en el taller: </h3>
    <?php

    require "Consultas.php";

    if (!$esAdministrador->num_rows > 0) { // ConsultarSinAcciones($conn);
        ?>
        <div id="table_cont">
            <table class="table " id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col">ID Equipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción de la falla</th>
                        <th scope="col">Recibio</th>
                        <th scope="col">Entrego</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Procedencia</th>
                        <th scope="col">Ingreso al taller</th>

                    </tr>
                </thead>
                <tbody id="resEquipos">

                </tbody>
            </table>
        </div>

    <?php
    } else { //consultarTodo($conn);
        ?>

        <div id="table_cont">
            <table class="table " id="tablaDatos">
                <thead>
                    <tr>
                        <th scope="col">ID Equipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción de la falla</th>
                        <th scope="col">Recibio</th>
                        <th scope="col">Entrego</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Procedencia</th>
                        <th scope="col">Ingreso al taller</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="resEquipos2">

                </tbody>
            </table>
        </div>
    <?php   } ?>




    <form action="libs/CerrarSesion.php" method="post">
        <button class="btn btn-danger">Cerrar Sesión</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script src="../js/datos.js"></script>

    <script type="text/javascript">
        function redirAgregar() {
            window.location = "AgregarEquipos.php";
        }
    </script>
</body>

</html>