<?php

namespace Acme\Controller\Printer\Bases;


use Crabbly\FPDF\Fpdf as baseFpdf;

class PDFReporteSede extends baseFpdf
{
    protected $ftitle;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = "title", $dates = null, $user, $total)
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;
        $this->dates = $dates;
        $this->user = $user;
        $this->total = $total;
    }

    // Page header
    function Header()
    {
        $today = date("d/m/Y");
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(190,10,'Page '.$this->PageNo().'/{nb} '. $this->ftitle . ' '. $today ,0,0,'L');
        $this->Cell(55,10,'Por: '. $this->user ,0,0,'L');
        // Line break
        $this->Ln();

        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Title
        $this->Cell(220,10, $this->ftitle,0,0,'C');
        // Line break
        $this->Ln();


        // Arial bold 15
        $this->SetFont('Arial','',8);
        $this->Cell(220, 10, "Desde: " . $this->dates['inicio']->format('d/m/Y') . " - Hasta: " . $this->dates['fin']->format('d/m/Y'), 0,0,'C');
        // Line break
        $this->Ln();

        /**
         * Cabezera
         */
        $this->SetFont('Arial', 'B', 8);
        $this->Cell('15', '5', 'No Factura', 1, '', 'C');
        $this->Cell('64', '5', 'Paciente', 1, '', 'C');
        $this->Cell('5', '5', 'Sx', 1, '', 'C');
        $this->Cell('10', '5', 'Edad', 1, '', 'C');
        $this->Cell('30', '5', 'Medico', 1, '', 'C');
        $this->Cell('45', '5', 'Examen', 1, '', 'C');
        $this->Cell('40', '5', 'Firma', 1, '', 'C');
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
        $this->Cell(180,10,'Page '.$this->PageNo().'/{nb} '. $this->ftitle,0,0,'L');

        $this->Cell(20, 10, 'Total Registros : '. $this->total);

    }
}