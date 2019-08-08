<?php
require "libs/Conexion.php";
require "libs/Seguridad.php";

$seguridad = new Seguridad();

if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
    exit;
}

$id = base64_decode($_GET["w"]);
$USER = $seguridad->getUsuario();


$consulta = mysqli_query($conn,"DELETE FROM EQUIPOS WHERE ID_EQUIPO = '$id'");

if ($consulta ===true){
    echo "<script>alert('Equipo eliminado correctamente por: $USER'); history.back();</script>";
}else{
    echo "<script>alert('hubo un error al eliminar el equipo!'); history.back();</script>";
}


?>
