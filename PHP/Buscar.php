<?php
require "Consultas.php";
require "libs/Conexion.php";
require "libs/Seguridad.php";


$seguridad = new Seguridad();

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
    <title>Busquedas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/TablaAll.css">

    <style>
        nav {
            background: rgb(63, 94, 251);
            background: radial-gradient(circle, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);

        }

        #buscarEquipo {
            width: 50%;

        }
    </style>

</head>

<body style="background-color: #c9d0d1">

    <nav class="navbar navbar-black">
        <input type="search" class="form-control" id="buscarEquipo" placeholder="Nombre/descripción del equipo">
        <button class="btn btn-success" id="btnBuscar">Buscar</button>
    </nav>

    <h3>Lista de equipos pendientes:</h3>

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

    <a style="margin:6%" href="Menu.php" class="btn btn-secondary">Regresar</a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/datos.js"></script>
</body>

</html>