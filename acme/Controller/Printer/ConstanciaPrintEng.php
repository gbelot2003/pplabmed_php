<?php

namespace Acme\Controller\Printer;

use Acme\Helpers\PdfStringConversor;
use Acme\Controller\Printer\Bases\PDFConstancia as PDF;
use App\MuestrasEng;
use Dedicated\GoogleTranslate;

class ConstanciaPrintEng
{
    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfReport(MuestrasEng $data)
    {
        $pdf = new PDF($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = "Titulo");

        $pdf->SetLeftMargin(25);
        $pdf->SetRightMargin(20);

        $pdf->SetTopMargin(50);
        $pdf->AddPage();

        /**
         * Cabezera
         */
        $pdf->SetFont('Helvetica', 'B', 15);
        $pdf->Cell(165, 10, "CONSTANCE", 0,  0, 'C');

        /**
         * Salto
         */
        $pdf->ln(20);
        $pdf->SetFont('Helvetica', '', 13);
        $pdf->writeHTMLCell(165, 10, '', '', $data->body, 0, 0, false, false, 'J', true);

        /**
         * Salto
         */
        $pdf->ln(135);
        $pdf->SetFont('Helvetica', 'B', 13);
        $pdf->Cell(75, 5, $data->firma->name , 0, 0, 'C');
        $pdf->ln();
        $pdf->Cell(75, 5, $this->ConvertCharacters->convert("MEDICAL PATHOLOGIST") , 0, 0, 'C');

        return $pdf->Output();
    }


}