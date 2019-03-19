<?php
require "libs/Conexion.php";
require "libs/Seguridad.php";

$seguridad = new Seguridad();

if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
    exit;
}

$id = $_GET["id"];
$idUsuario = $_GET["id_user"];

//$consultaElim = mysqli_query($conn, "INSERT INTO delEquiposRes(ID_EQUIPO,DESCRIPCION,USUARIO_QUE_ELIMINA,FECHA)
//VALUES ((SELECT ID_Equipo FROM equipos WHERE ID_Equipo='$id')),(SELECT Descripcion FROM equipos WHERE ID_Equipo='$id'),'$idUsuario', NOW()");

$setUsuario = mysqli_query($conn,"UPDATE equipos SET ID_Usuario = (SELECT ID_Usuario FROM usuarios WHERE nombre_Usuario = '$idUsuario)");

$consulta = mysqli_query($conn,"DELETE FROM equipos WHERE ID_Equipo = '$id'");

if ($consulta ===true){
    echo "<script>alert('Equipo eliminado correctamente por: $idUsuario'); history.back();</script>";
}else{
    echo "<script>alert('hubo un error al eliminar el equipo!'); history.back();</script>";
}


?>
