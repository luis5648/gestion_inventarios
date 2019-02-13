<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar equipos</title>
    <link rel="stylesheet" href="../css/TablaAll.css">
    <style type="text/css">
        div{

            background-color: #e6f7ff;
        }
        button{
            padding: 10px;
            margin: 20px;

        }

    </style>
</head>
<body>
<body style="background-color: #e6f7ff ">
<div style="background-color: white">
    <h2>Aqui puedes agregar un equipo.</h2>
</div>
<div>
    <form action="" method="post">
        <p>ID:</p>
        <input type="text" name="id_equipo">
        <p>Modelo:</p>
        <input type="text" name="modelo">
        <p>Marca:</p>
        <input type="text" name="marca">
        <p>No. serie:</p>
        <input type="text" name="no_serie">
        <p>Ubicacion:</p> <input type="text" name="ubicacion">
    </form>
    <form action="/action_page.php">
        <p>Categoria: </p>
        <input type="url" name="Categoria" list="url_lista">
        <datalist id="url_lista">
            <option label="Computo" value="Computo"></option>
            <option label="Telefonia" value="Telefonia"></option>
            <option label="Redes" value="Redes"></option>
            <option label="Servidores" value="Servidores"></option>
            <option label="Cableado estructurado" value="Cableado"></option>
        </datalist>
    </form>
    <button>Agregar</button>
    <button><a href="D:\crud.html" target="" title="Conexion"></a>Regresar</button>
</div>
<hr>
<?php

require "Conexion.php";
require "Consultas.php";

consultarTodo($conn);

?>
</body>
</html>

