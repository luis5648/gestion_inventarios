<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/TablaAll.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">

</head>

<body>

</body>

</html>
<?php

function consultarTodo($conn)
{

    $usuario = $_SESSION["usuario"];

    $stmn = "SELECT * FROM EQUIPOS ";


    $result = $conn->query($stmn);

    // echo "<br> <h3>Equipos en el taller:</h3>";
    // echo "<div id='table_cont'><table><tr><th>ID del equipo</th> <th>Equipo</th> <th>Falla</th><th>Recibió</th><th>Entrego</th><th>Teléfono</th><th>Procedencia</th><th>Fecha de entrega</th><th>Acciones</th></tr>";

    if ($result->num_rows > 0) {


        while ($fila = $result->fetch_assoc()) {

            // echo "<tr><td>" . $fila["ID_EQUIPO"] . "</td>";
            // echo "<td>" . $fila["EQUIPO_DESCRIPCION"] . "</td>";
            // echo "<td>" . $fila["EQUIPO_PROBLEMA"] . "</td>";
            // echo "<td>" . $fila["EQUIPO_UCTA_RECIBE"] . "</td>";
            // echo "<td>" . $fila["EQUIPO_PERSONA_ENTREGA"] . "</td>";
            // echo "<td>" . $fila["EQUIPO_TELEFONO_PERSONA"] . "</td>";
            // echo "<td>" . $fila["EQUIPO_PROCEDENCIA"] . "</td>";
            // echo "<td>" . $fila["EQUIPO_FECHA"] . "</td>";
            echo "<td><a href=\"Modificar.php?w=" . base64_encode($fila['ID_EQUIPO']) . "\">Modificar</a> | <a href=\"Eliminar.php?w=" . base64_encode($fila['ID_EQUIPO']) . "&y=" . base64_encode($usuario) . "\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\">Eliminar</a></td>";
        }
    } else {
        echo "No se encontraron equipos en el inventario";
    }

    echo "</table> </div>";
}

