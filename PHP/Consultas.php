<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 13/02/2019
 * Time: 12:42 PM
 */
//require "Conexion.php";

function consultarTodo($conn){

    $stmn = "SELECT * FROM equipos";
    $stmn2 = "SELECT Nombre_Propietario FROM propietario inner join equipos e on propietario.ID_Propietario = e.ID_Propietario";

    $stmn3 = "SELECT Nombre_Categoria FROM categoria inner join equipos e on categoria.ID_Categoria = e.ID_Categoria";

    $result  = $conn->query($stmn);
    $result2 = $conn->query($stmn2);
    $result3 = $conn->query($stmn3);

    echo "<h2>Equipos en el inventario</h2>";
    echo "<table><tr><th>ID del equipo</th> <th>Nombre del equipo</th> <th>Modelo</th><th>Marca</th><th>Ubicación</th><th>Propietario</th><th>Categoría</th><th>Número de serie</th></tr>";

    if ($result->num_rows>0&&$result2->num_rows>0&&$result3->num_rows>0){
        $fila2 = $result2->fetch_assoc();
        $fila3 = $result3->fetch_assoc();
        while ($fila = $result->fetch_assoc()){
            echo "<tr><td>".$fila["ID_Equipo"]."</td>";
            echo "<td>".$fila["Nombre_Equipo"]."</td>";
            echo "<td>".$fila["Modelo"]."</td>";
            echo "<td>".$fila["Marca"]."</td>";
            echo "<td>".$fila["Ubicacion"]."</td>";
            echo "<td>".$fila2["Nombre_Propietario"]."</td>";
            echo "<td>".$fila3["Nombre_Categoria"]."</td>";
            echo "<td>".$fila["N_serie"]."</td></tr>";


        }
    }

    echo "</table>";
}