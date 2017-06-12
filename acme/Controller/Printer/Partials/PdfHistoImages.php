<?php

namespace Acme\Controller\Printer\Partials;

use Acme\Helpers\PdfStringConversor;
use App\Histopatologia;


class PdfHistoImages {

    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function output(Histopatologia $data, $pdf)
    {

        $pdf = app('FPDF');
        setlocale(LC_CTYPE, 'en_US');

        /**
         * Nombre
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 10, 'Nombre: ', 1, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(90, 10, $this->ConvertCharacters->convert($data->facturas->nombre_completo_cliente), 1, 0, 'L');

    }
}