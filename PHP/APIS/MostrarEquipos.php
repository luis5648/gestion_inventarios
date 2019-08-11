<?php

require "../libs/Seguridad.php";
require "../libs/Conexion.php";

$seguridad = new Seguridad();

if ($seguridad->getUsuario() == null) {
    header('Location: ../../index.php');
    exit;
}




$consulta  = mysqli_query($conn, "SELECT * FROM EQUIPOS WHERE STATUS = 'PENDIENTE'");

$JSON = array();

while ($fila = mysqli_fetch_array($consulta)) {
    $JSON[] = array(
        'id' => $fila['ID_EQUIPO'],
        'descripcion' => $fila['EQUIPO_DESCRIPCION'],
        'falla' => $fila['EQUIPO_PROBLEMA'],
        'recibio' => $fila['EQUIPO_UCTA_RECIBE'],
        'entrego' => $fila['EQUIPO_PERSONA_ENTREGA'],
        'telefono' => $fila['EQUIPO_TELEFONO_PERSONA'],
        'procedencia' => $fila['EQUIPO_PROCEDENCIA'],
        'fecha' => $fila['EQUIPO_FECHA']
    );
}

echo json_encode($JSON);
