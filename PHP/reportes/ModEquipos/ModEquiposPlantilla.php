<?php
require "../fpdf/fpdf.php";
class PDF extends FPDF
{
    function Header(){

        $this->SetMargins(20,20);


        $this->Image('../LogoCTA.png', 5, 5, 30 );
        $this->SetFont('Arial','B',16);
        $this->Cell(30);
        $this->Cell(120,10, 'Reporte de equipos modificados',0,0,'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
    }
}


?>