<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

    echo "<br> <h3>Equipos en el taller:</h3>";
    echo "<div id='table_cont'><table><tr><th>ID del equipo</th> <th>Equipo</th> <th>Falla</th><th>Recibió</th><th>Entrego</th><th>Teléfono</th><th>Procedencia</th><th>Fecha de entrega</th><th>Acciones</th></tr>";

    if ($result->num_rows > 0) {


        while ($fila = $result->fetch_assoc()) {

            echo "<tr><td>" . $fila["ID_EQUIPO"] . "</td>";
            echo "<td>" . $fila["EQUIPO_DESCRIPCION"] . "</td>";
            echo "<td>" . $fila["EQUIPO_PROBLEMA"] . "</td>";
            echo "<td>" . $fila["EQUIPO_UCTA_RECIBE"] . "</td>";
            echo "<td>" . $fila["EQUIPO_PERSONA_ENTREGA"] . "</td>";
            echo "<td>" . $fila["EQUIPO_TELEFONO_PERSONA"] . "</td>";
            echo "<td>" . $fila["EQUIPO_PROCEDENCIA"] . "</td>";
            echo "<td>" . $fila["EQUIPO_FECHA"] . "</td>";
            echo "<td><a href=\"Modificar.php?w=".base64_encode($fila['ID_EQUIPO'])."\">Modificar</a> | <a href=\"Eliminar.php?w=".base64_encode($fila['ID_EQUIPO'])."&y=".base64_encode($usuario)."\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\">Eliminar</a></td></tr>";


        }
    }else{
        echo "No se encontraron equipos en el inventario";
    }

    echo "</table> </div>";
}

function ConsultarSinAcciones($conn)
{

    $stmn = "SELECT * FROM EQUIPOS ";


    $result = $conn->query($stmn);

    echo "<br> <h3>Equipos en el taller:</h3>";
    echo "<div id='table_cont'><table><tr><th>ID del equipo</th> <th>Equipo</th> <th>Falla</th><th>Recibió</th><th>Entrego</th><th>Teléfono</th><th>Procedencia</th><th>Fecha de entrega</th</tr>";

    if ($result->num_rows > 0) {


        while ($fila = $result->fetch_assoc()) {

            echo "<tr><td>" . $fila["ID_EQUIPO"] . "</td>";
            echo "<td>" . $fila["EQUIPO_DESCRIPCION"] . "</td>";
            echo "<td>" . $fila["EQUIPO_PROBLEMA"] . "</td>";
            echo "<td>" . $fila["EQUIPO_UCTA_RECIBE"] . "</td>";
            echo "<td>" . $fila["EQUIPO_PERSONA_ENTREGA"] . "</td>";
            echo "<td>" . $fila["EQUIPO_TELEFONO_PERSONA"] . "</td>";
            echo "<td>" . $fila["EQUIPO_PROCEDENCIA"] . "</td>";
            echo "<td>" . $fila["EQUIPO_FECHA"] . "</td> </tr>";
           


        }
    }else{
        echo "No se encontraron equipos en el inventario";
    }

    echo "</table> </div>";
}

function buscaID($conn, $condicion)
{

    $stmn = "SELECT ID_Equipo, Modelo, N_serie, Ubicacion, Marca, Descripcion, Nombre_Categoria, Nombre_Propietario FROM equipos inner
  join
  categoria c on equipos.ID_Categoria = c.ID_Categoria inner join propietario p on equipos.ID_Propietario = p.ID_Propietario WHERE ID_Equipo=$condicion";


    $result = $conn->query($stmn);

    echo "<h2>Resultados de la busqueda</h2>";
    echo "<table><tr><th>ID del equipo</th> <th>Nombre del equipo</th> <th>Modelo</th><th>Marca</th><th>Ubicación</th><th>Propietario</th><th>Categoría</th><th>Número de serie</th></tr>";

    if ($result->num_rows > 0) {


        while ($fila = $result->fetch_assoc()) {

            echo "<tr><td>" . $fila["ID_Equipo"] . "</td>";
            echo "<td>" . $fila["Descripcion"] . "</td>";
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

function buscarCategoria($conn, $condicion)
{
    $stmn = "SELECT ID_Equipo, Modelo, N_serie, Ubicacion, Marca, Descripcion, Nombre_Categoria, Nombre_Propietario FROM equipos inner join
  categoria c on equipos.ID_Categoria = c.ID_Categoria inner join propietario p on equipos.ID_Propietario = p.ID_Propietario WHERE Nombre_Categoria='$condicion'";


    $result = $conn->query($stmn);

    echo "<h2>Resultados de la busqueda</h2>";
    echo "<table><tr><th>ID del equipo</th> <th>Nombre del equipo</th> <th>Modelo</th><th>Marca</th><th>Ubicación</th><th>Propietario</th><th>Categoría</th><th>Número de serie</th></tr>";

    if ($result->num_rows > 0) {


        while ($fila = $result->fetch_assoc()) {

            echo "<tr><td>" . $fila["ID_Equipo"] . "</td>";
            echo "<td>" . $fila["Descripcion"] . "</td>";
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

function buscarPropietario($conn, $condicion)
{
    $stmn = "SELECT ID_Equipo, Modelo, N_serie, Ubicacion, Marca, Descripcion, Nombre_Categoria, Nombre_Propietario, Telefono,Aula FROM 
                                                                                                                  equipos inner join categoria c on equipos.ID_Categoria = c.ID_Categoria inner join propietario p on equipos.ID_Propietario = p.ID_Propietario WHERE Nombre_Propietario='$condicion'";


    $result = $conn->query($stmn);

    echo "<h2>Resultados de la busqueda</h2>";
    echo "<table><tr><th>ID del equipo</th> <th>Nombre del equipo</th> <th>Modelo</th><th>Marca</th><th>Ubicación</th><th>Número de serie</th><th>Categoría</th><th>Propietario</th><th>Teléfono propietario</th><th>Aula propietario</th></tr>";

    if ($result->num_rows > 0) {


        while ($fila = $result->fetch_assoc()) {

            echo "<tr><td>" . $fila["ID_Equipo"] . "</td>";
            echo "<td>" . $fila["Descripcion"] . "</td>";
            echo "<td>" . $fila["Modelo"] . "</td>";
            echo "<td>" . $fila["Marca"] . "</td>";
            echo "<td>" . $fila["Ubicacion"] . "</td>";
            echo "<td>" . $fila["N_serie"] . "</td>";
            echo "<td>" . $fila["Nombre_Categoria"] . "</td>";
            echo "<td>" . $fila["Nombre_Propietario"] . "</td>";
            echo "<td>" . $fila["Telefono"] . "</td>";
            echo "<td>" . $fila["Aula"] . "</td></tr>";




        }
    }

    echo "</table>";
}

function ConsultarPropietarios($conn){
    $sqlP = "SELECT * FROM propietario";
    $res = $conn->query($sqlP);


    echo "<h6><h6>";
    echo "<div id='table_cont'><table><tr><th>ID del propietario</th><th>Nombre</th><th>Telefono</th><th>Aula</th></tr>";
    if ($res->num_rows > 0) {
        while ($fila = $res->fetch_assoc()) {
            echo "<tr><td>" . $fila["ID_Propietario"] . "</td>";
            echo "<td>" . $fila["Nombre_Propietario"] . "</td>";
            echo "<td>" . $fila["Telefono"] . "</td>";
            echo "<td>" . $fila["Aula"] . "</td>";
            echo "<td><a href=\"ModificarPropietarios?id=$fila[ID_Propietario]\">Modificar</a> | <a href=\"EliminarPropietarios.php?id=".$fila['ID_Propietario']."\" onClick=\"return confirm('¿Está seguro que desea eliminar el registro?')\">Eliminar</a></td></tr>";


        }
    }

    echo "</table></div>";
}