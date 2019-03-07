<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 06/03/2019
 * Time: 11:09 AM
 */

ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

require_once "TCPDF-master/tcpdf.php";
require_once "../../libs/Conexion.php";
require "../../Consultas.php";

$pdf = new TCPDF('L', 'mm', 'Letter', true, 'UTF-8', false);


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(20, 20, 20, false);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();


$stmn = "SELECT ID_Equipo, Modelo, N_serie, Ubicacion, Marca, Descripcion, Nombre_Categoria, Nombre_Propietario FROM equipos inner join
  categoria c on equipos.ID_Categoria = c.ID_Categoria inner join propietario p on equipos.ID_Propietario = p.ID_Propietario ORDER BY ID_Equipo DESC";


$result = $conn->query($stmn);
$contenido='';
$contenido.= <<<EOF
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;


}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
EOF;

$contenido.= "<h2>Equipos en el inventario</h2>";
$contenido.="<table><tr><th>ID del equipo</th> <th>Nombre del equipo</th> <th>Modelo</th><th>Marca</th><th>Ubicación</th><th>Propietario</th><th>Categoría</th><th>Número de serie</th></tr>";

if ($result->num_rows > 0) {


    while ($fila = $result->fetch_assoc()) {

        $contenido .= "<tr><td>" . $fila["ID_Equipo"] . "</td>";
        $contenido .= "<td>" . $fila["Descripcion"] . "</td>";
        $contenido .= "<td>" . $fila["Modelo"] . "</td>";
        $contenido .= "<td>" . $fila["Marca"] . "</td>";
        $contenido .= "<td>" . $fila["Ubicacion"] . "</td>";
        $contenido .= "<td>" . $fila["Nombre_Propietario"] . "</td>";
        $contenido .= "<td>" . $fila["Nombre_Categoria"] . "</td>";
        $contenido .= "<td>" . $fila["N_serie"] . "</td></tr>";

    }
}
$contenido.="</table>";

ob_end_clean();

$pdf->writeHTML($contenido, true, 0, true, 0);
$pdf->lastPage();
$pdf->output('Reporte.pdf', 'I');
?>