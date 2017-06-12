<?php

namespace Acme\Controller\Printer;

use Crabbly\FPDF\Fpdf as baseFpdf;

class PDF extends baseFpdf
{

    protected $ftitle;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4', $ftitle = "title")
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;

    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb} - Biopsia No.'. $this->ftitle,0,0,'L');
    }
}