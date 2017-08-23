<?php

namespace Acme\Controller\Printer;

use Acme\Helpers\PdfStringConversor;
use App\Muestra;
use Acme\Controller\Printer\Bases\PDFConstancia as PDF;

class ConstanciaPrint {

    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfReport(Muestra $data)
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
        $pdf->Cell(165, 10, $this->ConvertCharacters->convert("CONSTANCIA"), 0,  0, 'C');

        /**
         * Salto
         */
        $pdf->ln(20);
        $pdf->SetFont('Helvetica', '', 13);
        $pdf->MultiCell(165, 10, '', '', $data->body, 0, 0, 0, false, 'J', true);
        //w, h, x, y, html = '', border = 0, ln = 1, fill = 0, reseth = true, align = '', autopadding = true


        /**
         * Salto
         */
        $pdf->ln(135);
        $pdf->SetFont('Helvetica', 'B', 13);
        $pdf->Cell(75, 5, $data->firma->name , 0, 0, 'C');
        $pdf->ln();
        $pdf->Cell(75, 5, $this->ConvertCharacters->convert("MEDICO PATOLOGO") , 0, 0, 'C');

        return $pdf->Output();
    }
}