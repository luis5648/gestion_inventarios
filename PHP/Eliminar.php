<?php
require "libs/Conexion.php";
require "libs/Seguridad.php";

$seguridad = new Seguridad();

if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
    exit;
}

$id = $_GET["id"];
$consulta = mysqli_query($conn,"DELETE FROM equipos WHERE ID_Equipo = '$id'");

if ($consulta ===true){
    echo "<script>alert('Equipo eliminado correctamente!'); history.back();</script>";
}else{
    echo "<script>alert('Equipo eliminado correctamente!'); history.back();</script>";
}


?>
