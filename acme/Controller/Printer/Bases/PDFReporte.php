<?php

namespace Acme\Controller\Printer\Bases;


use Crabbly\FPDF\Fpdf as baseFpdf;

class PDFReporte extends baseFpdf
{
    protected $ftitle;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = "title", $dates = null, $user)
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;
        $this->dates = $dates;
        $this->user = $user;

    }

    // Page header
    function Header()
    {

        $today = date("d/m/Y");
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(150,10,'Page '.$this->PageNo().'/{nb} '. $this->ftitle . ' '. $today ,0,0,'L');
        $this->Cell(55,10,'Por: '. $this->user ,0,0,'L');
        // Line break
        $this->Ln();

        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(40,10, $this->ftitle,0,0,'C');
        // Line break
        $this->Ln();


        $this->Cell(70);
        // Arial bold 15
        $this->SetFont('Arial','',8);
        $this->Cell(80, 10, "Desde: " . $this->dates['inicio']->format('d/m/Y') . " - Hasta: " . $this->dates['fin']->format('d/m/Y'));
// Line break
        $this->Ln();
        /**
         * Cabezera
         */
        $this->SetFont('Arial', 'B', 8);
        $this->Cell('20', '5', 'No de Factura', 1, '', 'C');
        $this->Cell('45', '5', 'Paciente', 1, '', 'C');
        $this->Cell('10', '5', 'Sexo', 1, '', 'C');
        $this->Cell('10', '5', 'Edad', 1, '', 'C');
        $this->Cell('35', '5', 'Medico', 1, '', 'C');
        $this->Cell('45', '5', 'Examen', 1, '', 'C');
        $this->Cell('30', '5', 'Informe',1, 0, 'C', 0, '2');
        $this->ln(5 );

    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-10);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb} '. $this->ftitle,0,0,'L');
    }
}