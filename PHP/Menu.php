<?php
require "Conexion.php";


$stmn = "SELECT * FROM equipos";
$stmn2 = "SELECT nombreUsuario FROM usuarios inner join equipos e on usuarios.ID_Usuario = e.ID_Usuario";

$result  = $conn->query($stmn);
$result2 = $conn->query($stmn2);



?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menú principal</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

    <?php
    echo "<table><tr><th>ID del equipo</th> <th>Nombre del equipo</th> <th>Modelo</th><th>Marca</th><th>Ubicación</th> <th>Departamento</th><th>Número de serie</th></tr>";

        if ($result->num_rows>0&&$result2->num_rows>0){
            $fila2 = $result2->fetch_assoc();
            while ($fila = $result->fetch_assoc()){
                echo "<tr><td>".$fila["ID_Equipo"]."</td>";
                echo "<td>".$fila["Nombre_Equipo"]."</td>";
                echo "<td>".$fila["Modelo"]."</td>";
                echo "<td>".$fila["Marca"]."</td>";
                echo "<td>".$fila["Ubicacion"]."</td>";
                echo "<td>".$fila2["nombreUsuario"]."</td></tr>";
                echo "<td>".$fila["N_serie"]."</td>";


            }
        }

echo "</table>";
?>
</body>
</html>
