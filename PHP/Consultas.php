<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 13/02/2019
 * Time: 12:42 PM
 */


function consultarTodo($conn)
{

    $stmn = "SELECT ID_Equipo, Modelo, N_serie, Ubicacion, Marca, Nombre_Equipo, Nombre_Categoria, Nombre_Propietario FROM equipos inner join categoria c on equipos.ID_Categoria = c.ID_Categoria inner join propietario p on equipos.ID_Propietario = p.ID_Propietario ORDER BY ID_Equipo DESC";


    $result = $conn->query($stmn);

    echo "<h2>Equipos en el inventario</h2>";
    echo "<table><tr><th>ID del equipo</th> <th>Nombre del equipo</th> <th>Modelo</th><th>Marca</th><th>Ubicación</th><th>Propietario</th><th>Categoría</th><th>Número de serie</th><th>Acciones</th></tr>";

    if ($result->num_rows > 0) {


        while ($fila = $result->fetch_assoc()) {

            echo "<tr><td>" . $fila["ID_Equipo"] . "</td>";
            echo "<td>" . $fila["Nombre_Equipo"] . "</td>";
            echo "<td>" . $fila["Modelo"] . "</td>";
            echo "<td>" . $fila["Marca"] . "</td>";
            echo "<td>" . $fila["Ubicacion"] . "</td>";
            echo "<td>" . $fila["Nombre_Propietario"] . "</td>";
            echo "<td>" . $fila["Nombre_Categoria"] . "</td>";
            echo "<td>" . $fila["N_serie"] . "</td>";
            echo "<td><a href=\"Modificar.php?id=$fila[ID_Equipo]\">Modificar</a> | <a href=\"Eliminar.php?id=$fila[ID_Equipo]\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\">Eliminar</a></td></tr>";


        }
    }

    echo "</table>";
}

function ConsultarSinAcciones($conn){

    $stmn = "SELECT ID_Equipo, Modelo, N_serie, Ubicacion, Marca, Nombre_Equipo, Nombre_Categoria, Nombre_Propietario FROM equipos inner join categoria c on equipos.ID_Categoria = c.ID_Categoria inner join propietario p on equipos.ID_Propietario = p.ID_Propietario ORDER BY ID_Equipo DESC";


    $result = $conn->query($stmn);

    echo "<h2>Equipos en el inventario</h2>";
    echo "<table><tr><th>ID del equipo</th> <th>Nombre del equipo</th> <th>Modelo</th><th>Marca</th><th>Ubicación</th><th>Propietario</th><th>Categoría</th><th>Número de serie</th></tr>";

    if ($result->num_rows > 0) {


        while ($fila = $result->fetch_assoc()) {

            echo "<tr><td>" . $fila["ID_Equipo"] . "</td>";
            echo "<td>" . $fila["Nombre_Equipo"] . "</td>";
            echo "<td>" . $fila["Modelo"] . "</td>";
            echo "<td>" . $fila["Marca"] . "</td>";
            echo "<td>" . $fila["Ubicacion"] . "</td>";
            echo "<td>" . $fila["Nombre_Propietario"] . "</td>";
            echo "<td>" . $fila["Nombre_Categoria"] . "</td>";
            echo "<td>" . $fila["N_serie"] . "</td>";



        }
    }

    echo "</table>";
}