<?php


namespace Acme\Controller\Printer\Reportes;

use Acme\Helpers\PdfStringConversor;
use Illuminate\Database\Eloquent\Model;

class BiopiasHojaTrabajo
{
    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfHitoReport($data, $bdate, $edate)
    {
        //$ftitle =  $data->serial . "-" . $data->created_at->format('Y');
        $ftitle =  "Facturas";
        $pdf = new PDF($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle);
        setlocale(LC_CTYPE, 'en_US');

        /**
         * Cabezera
         */
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->Cell(180, 10, $this->ConvertCharacters->convert("Hoja de Biopsias "), 0,  0, 'C');

        return $pdf->Output();
    }

}