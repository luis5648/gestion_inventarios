<?php
require "libs/Conexion.php";
require "Consultas.php";

$iDequipo = $_POST["id_equipo"];
$nombreEquipo = $_POST["nombre_equipo"];
$modeloEquipo = $_POST["modelo"];
$serieEquipo = $_POST["no_serie"];
$marcaEquipo = $_POST["marca"];
$ubicacionEquipo = $_POST["ubicacion"];
$categoriaEquipo = $_POST["Categoria"];
$propieterioEquipo = $_POST["Propietario"];

$cat = "SELECT ID_Categoria FROM categoria where Nombre_Categoria = '$categoriaEquipo'";
$prop = "SELECT ID_Propietario FROM propietario where Nombre_Propietario = '$propieterioEquipo'" ;

$res1= $conn->query($cat);
$res2= $conn->query($prop);

$catDat = $res1->fetch_assoc();
$propDat = $res2->fetch_assoc();

$n1 = $catDat["ID_Categoria"];
$n2 = $propDat["ID_Propietario"];

$sqlNuevoEquipo = "INSERT INTO equipos(ID_Equipo, Modelo, N_serie, Ubicacion, Marca, Nombre_Equipo, ID_Categoria, ID_Propietario)  VALUES ('$iDequipo','$modeloEquipo','$serieEquipo','$ubicacionEquipo','$marcaEquipo','$nombreEquipo','$n1',$n2) ";

if ($conn->query($sqlNuevoEquipo) === TRUE) {
    echo "<script>alert('Nuevo equipo agregado!'); location.href='Agregar.php'</script>";

}