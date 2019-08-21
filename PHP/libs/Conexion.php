<?php

$servername = "localhost";
$username = "luis";
$password = "newborn";
$dbname = "recepcion_equipos";


$conn = new mysqli($servername, $username, $password, $dbname);
$acentos = $conn->query("SET NAMES 'utf8'");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);

}


?>