<?php
require "libs/Seguridad.php";
require "libs/Conexion.php";
require "Consultas.php";
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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar equipos</title>
    <link rel="stylesheet" href="../css/TablaAll.css">
    <style type="text/css">
        div {

            background-color: #e6f7ff;
        }

        button {
            padding: 10px;
            margin: 20px;

        }

    </style>
</head>
<body style="background-color: #e6f7ff ">
<div style="background-color: white">
    <h2>Aqui puedes agregar un equipo.</h2>
</div>
<div>
    <form action="addItems.php" method="post">
        <p>ID:</p>
        <input type="text" name="id_equipo">
        <p>Nombre (Descripción del equipo):</p>
        <input type="text" name="nombre_equipo">
        <p>Modelo:</p>
        <input type="text" name="modelo">
        <p>Marca:</p>
        <input type="text" name="marca">
        <p>No. serie:</p>
        <input type="text" name="no_serie">
        <p>Ubicacion:</p> <input type="text" name="ubicacion">

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
                    echo "<option label=" . $cat["Nombre_Categoria"] . " value=" . $cat["Nombre_Categoria"] . "></option>";
                }
            }
            echo "</datalist>";

            echo "<p>Propietario: </p>";

            echo "<input type = 'text' name = 'Propietario' list = 'url_listaP' >";
            echo "<datalist id = 'url_listaP' >";

            if ($resProp->num_rows > 0) {
                while ($prop = $resProp->fetch_assoc()) {
                    echo "<option label=" . $prop["Nombre_Propietario"] . " value=" . $prop["Nombre_Propietario"] . "></option>";
                }
            }
            echo "</datalist>";
            ?>
            <button>Agregar</button>
    </form>

    <button><a href="D:\crud.html" target="" title="Conexion"></a>Regresar</button>
</div>
<hr>
<?php


consultarTodo($conn);

?>
</body>
</html>

