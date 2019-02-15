<?php
require "libs/Conexion.php";
$id = $_GET["id"];
$consulta = mysqli_query($conn,"DELETE FROM equipos WHERE ID_Equipo = '$id'");

echo "<script>alert('Equipo eliminado correctamente!'); history.back();</script>";
?>
