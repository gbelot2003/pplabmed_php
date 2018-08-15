<?php

namespace Acme\Controller\Printer\Bases;


use Crabbly\FPDF\Fpdf as baseFpdf;
use Acme\Helpers\PdfStringConversor;


class PDFReporteEsMorfo extends baseFpdf
{
    protected $ftitle;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = "title", $dates = null, $user)
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;
        $this->dates = $dates;
        $this->user = $user;
        $this->ConvertCharacters = new PdfStringConversor();

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
        // Move to the right
        $this->Cell(95);
        // Title
        $this->Cell(40,10, $this->ftitle,0,0,'C');
        // Line break
        $this->Ln();


        $this->Cell(90);
        // Arial bold 15
        $this->SetFont('Arial','',8);
        $this->Cell(80, 10, "Desde: " . $this->dates['inicio']->format('d/m/Y') . " - Hasta: " . $this->dates['fin']->format('d/m/Y'));
        // Line break
        $this->Ln();
        /**
         * Cabezera
         */
        $this->SetFont('Arial', 'B', 8);
        $this->Cell('30', '5', 'Fecha Examen', 1, '', 'C');
        $this->Cell('25', '5', 'Factura', 1, '', 'C');
        $this->Cell('50', '5', 'Nombre', 1, '', 'C');
        $this->Cell('20', '5', $this->ConvertCharacters->convert('Morfología 1'), 1, '', 'C');
        $this->Cell('20', '5', $this->ConvertCharacters->convert('Morfología 2'), 1, '', 'C');
        $this->Cell('25', '5', $this->ConvertCharacters->convert('Topográfico'), 1, '', 'C');
        $this->Cell('25', '5', 'Correlativo', 1, '', 'C');
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