<?php

namespace Acme\Controller\Printer\Reportes;


use Crabbly\FPDF\Fpdf as baseFpdf;

class PDFReporte extends baseFpdf
{
    protected $ftitle;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = "title", $dates = null)
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;
        $this->dates = $dates;
    }

    // Page header
    function Header()
    {

        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb} '. $this->ftitle,0,0,'L');
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
        $this->Cell(80, 10, "Desde: " . $this->dates['inicio']->format('d/m/Y') . "Hasta: " . $this->dates['fin']->format('d/m/Y'));
// Line break
        $this->Ln();

    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-35);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb} '. $this->ftitle,0,0,'L');
    }
}