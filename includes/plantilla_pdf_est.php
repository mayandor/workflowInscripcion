<?php
require 'fpdf/fpdf.php';
class PDF extends FPDF
{
    function Header()
    {
        /* $this->Image('images/birrete.png',5,5,30); */
        $fecha=date('d, F, Y');
        $this->SetFont('Arial', '', 6);
        $this->Cell(36, 5, 'Universidad Mayor De Universidad', 'C', 0, 0);
        $this->Cell(140, 5, $fecha, 0, 1,'R');

        $this->Cell(130, 2, '          Carrera De Informatica', 'C', 1, 1);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(50);
        $this->Cell(120, 10, 'INF -324 PROG. MULTIMEDIAL', 'C', 1, 1);
        $this->SetFont('Arial', 'B', 6);

        $this->SetFont('Arial', 'B', 6);
        $this->Cell(45, 0, 'DIRECCION : ', 'C');
        $this->Cell(45, 0, '"Av. Villazon"', 'C', 1, 1);
        $this->SetFont('Arial', '', 6);

        $this->SetFont('Arial', 'B', 6);
        $this->Cell(45, 10, 'CIUDAD : ', 'C');
        $this->SetFont('Arial', '', 6);
        $this->Cell(45, 10, 'LA PAZ - BOLIVIA', 'C', 1, 1);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(50);
        $this->Cell(120, 10, 'ESTUDIANTES CURSO VERANO', 'C', 1, 1);
        $this->Ln(5);
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}
?>