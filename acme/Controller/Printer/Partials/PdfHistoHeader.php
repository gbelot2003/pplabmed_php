<?php

namespace Acme\Controller\Printer\Partials;

use Acme\Helpers\PdfStringConversor;
use App\Histopatologia;

class PdfHistoHeader {

    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function output(Histopatologia $data, $pdf)
    {

        /**
         * Cabezera
         */
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->Cell(180, 10, 'Reporte de Histopatologia', 0, 0, 'C');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Nombre
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 10, 'Nombre: ', 1, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(90, 10, $this->ConvertCharacters->convert($data->facturas->nombre_completo_cliente), 1, 0, 'L');

        /**
         * Edad
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 10, 'Edad: ', 1, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(15, 10, $data->facturas->edad, 1, 0, 'L');

        /**
         * Sexo
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 10, 'Sexo: ', 1, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(15, 10, $data->facturas->sexo, 1, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Medico
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 10, 'Medico: ', 1, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(65, 10, $this->ConvertCharacters->convert($data->facturas->medico), 1, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Dirección
         */
        $pdf->SetFont('Helvetica', '', 10);

        $pdf->Cell(20, 10, $this->ConvertCharacters->convert('Dirección') .': ', 1, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(145  , 10, $this->ConvertCharacters->convert($data->facturas->direccion_entrega_sede), 1, 0, 'L');

        return pdf;
    }
}