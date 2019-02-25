<?php
    require "ModEquiposPlantilla.php";
    require "../../libs/Conexion.php";

    $consulta = mysqli_query($conn,"SELECT * FROM EQUIPOS_MODIFICADO");

    	
	$pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();
    
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);
    $pdf->Cell(30,6,'ID del  reporte',0,0,'C',1);
    $pdf->Cell(30,6,'ID del  equipo',0,0,'C',1);
    $pdf->Cell(30,6,'Usuario',0,0,'C',1);
    $pdf->Cell(40,6,utf8_decode('Fecha de modificación'),0,1,'C',1);
    
    //Vaciado de la base de datos al pdf:

    while ($filas =$consulta->fetch_assoc()){

        $pdf->Cell(30,6,$filas["ID_REPORTE"],1,0,'C');

    }


	
    $pdf->SetFont('Arial','',10);
    
    $pdf->Output('F','reportePro.pdf');

    //http://www.fpdf.org/en/doc/index.php
?>