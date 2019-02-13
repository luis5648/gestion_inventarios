<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menú principal</title>
    <link rel="stylesheet" href="../css/TablaAll.css">
    <style>
        button{

            padding: 10px;
            margin: 15px;
            background-color: #ccebff;
            color: black;
            font-size: 15px;

        }
        .dropbt{
            color: black;
            padding: 16px;
            cursor: pointer;
            border:none;
        }
        .dropdown{
            position: relative;
            display: inline-block;
            color: white;

        }
        .dropcont{
            position: absolute;
            display: none;
            min-width: 160px;
            z-index: 1;
            background-color: white;
        }
        .dropcont a{
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown:hover .dropcont{
            display: block;
        }


    </style>
</head>
<body>
<body style="background-color: #d9f2d9">
<h1>Menú principal</h1>
<?php
session_start();
$user = $_SESSION['usuario'];
echo "Usuario en sesión: ".$user;
?>
<div style="background-color: white">

    <div class="dropdown" >
        <button class="dropbt">Agregar</button>
        <div class="dropcont">
            <a href="Agregar.php" target="_blank">Agregar equipo</a>
        </div>
    </div>
    <button class="dropbt">Consultar</button>
    <div class="dropdown">
        <button class="dropbt">Modificar</button>
        <div class="dropcont">
            <a href="Modificar.php" target="_blank">Modificar equipo</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbt">Eliminar</button>
        <div class="dropcont">
            <a href="Eliminar.php" target="_blank">Eliminar equipo</a>
        </div>
    </div>
</div>
<?php

require "Conexion.php";
require "Consultas.php";

consultarTodo($conn);

?>

</body>
</html>
