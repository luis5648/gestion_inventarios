<?php
require "libs/Conexion.php";
//consultas para actualización
session_start();
$id = $_SESSION["id"];
$idNuev = $_POST["id_equipo"];
$nombNuev = $_POST["nombre_equipo"];
$modNuev = $_POST["modelo"];
$marcNuev = $_POST["marca"];
$serNuev = $_POST["no_serie"];
$ubNuev = $_POST["ubicacion"];
$nuevCat = $_POST["Categoria"];
$nuevProp = $_POST["Propietario"];

$numCat = "SELECT ID_Categoria FROM categoria WHERE Nombre_Categoria ='$nuevCat'";
$numPropt = "SELECT ID_Propietario FROM propietario WHERE Nombre_Propietario ='$nuevProp'";

$c = ($conn->query($numCat))->fetch_assoc();
$p = ($conn->query($numPropt)->fetch_assoc());


$sqlActualizar = "UPDATE equipos SET ID_Equipo='$idNuev', Nombre_Equipo='$nombNuev',
                   Modelo='$modNuev', Marca='$marcNuev', N_serie='$serNuev',
                   Ubicacion='$ubNuev', ID_Categoria='$c[ID_Categoria]',ID_Propietario='$p[ID_Propietario]' WHERE ID_Equipo = '$id'";

if ($conn->query($sqlActualizar) === TRUE){
    echo "<script>alert('Equipo Actualizado!');";
}else{
    echo "<script>alert('Hubo un error al actualizar');";
}

?>