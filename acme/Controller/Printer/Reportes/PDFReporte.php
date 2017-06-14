<?php

namespace Acme\Controller\Printer\Reportes;


use Crabbly\FPDF\Fpdf as baseFpdf;

class PDFReporte extends baseFpdf
{
    protected $ftitle;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = "title")
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;
    }

    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10, $this->ftitle,1,0,'C');
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
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb} - Biopsia No.'. $this->ftitle,0,0,'L');
    }
}