<?php

namespace Acme\Controller\Printer;

use Acme\Helpers\PdfStringConversor;
use App\Histopatologia;

class HistoPrintConfig{

    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfHitoReport(Histopatologia $data)
    {
        $ftitle = $data->created_at->format('Y') . "-" .$data->serial;
        $pdf = new PDF($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = $ftitle);
        setlocale(LC_CTYPE, 'en_US');

        $pdf->SetTopMargin(45);
        $pdf->SetLeftMargin(20);
        $pdf->AddPage();

        $this->PrintHeader($data, $pdf);
        $this->PrintBody($data, $pdf);

        $pdf->AddPage();



        return $pdf->Output();
    }


    /**
     * @param Histopatologia $data
     * @param $pdf
     */
    protected function PrintBody(Histopatologia $data, $pdf)
    {
        /**
         * Salto
         */
        $pdf->ln();

        /**
         *  INFORME
         */
        $pdf->SetFont('Helvetica', 'B', 13);
        $pdf->Cell(163, 20, 'INFORME', 0,  0, 'C');

        /**
         * Salto
         */
        $pdf->ln();

        $pdf->SetFont('Helvetica', '', 10);
        $pdf->MultiCell(163, 5,
            $this->ConvertCharacters->convert(strip_tags($data->informe))
            , 0, 'J', false);
    }


    /**
     * @param Histopatologia $data
     * @param $pdf
     */
    protected function PrintHeader(Histopatologia $data, $pdf)
    {
        /**
         * Cabezera
         */
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->Cell(180, 10, $this->ConvertCharacters->convert("REPORTE DE HISTOPATOLOGÍA"), 0,  0, 'C');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Nombre
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 5, 'Nombre: ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(91, 5, $this->ConvertCharacters->convert($data->facturas->nombre_completo_cliente), 0, 0, 'L');

        /**
         * Edad
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 5, 'Edad: ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(15, 5, $data->facturas->edad, 0, 0, 'L');

        /**
         * Sexo
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 5, 'Sexo: ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(15, 5, $data->facturas->sexo, 0, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Medico
         */
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(20, 5, 'Medico: ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(145, 5, $this->ConvertCharacters->convert($data->facturas->medico), 0, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Dirección
         */
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(20, 5, $this->ConvertCharacters->convert('Dirección') .': ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(145, 5, $this->ConvertCharacters->convert($data->facturas->direccion_entrega_sede), 0, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Diagnostico
         */
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(22, 5, $this->ConvertCharacters->convert('Diagnóstico') .': ', 0, 0, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->MultiCell(143, 5, $this->ConvertCharacters->convert($data->diagnostico), 0, 'L', false);

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Material Estudiado
         */
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(32, 5, $this->ConvertCharacters->convert('Material Estudiado') .': ', 0, 0, 'L');

        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(130  , 5, $this->ConvertCharacters->convert($data->muestra), 0, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Fecha de Biopsia
         */
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(30, 5, $this->ConvertCharacters->convert('Fecha de Biosia') .': ', 0, 0, 'L');

        if($data->fecha_biopcia){
            $pdf->SetFont('Helvetica', 'B', 10);
            $pdf->Cell(78, 5, $data->fecha_biopcia->formatLocalized('%d/%m/%Y'), 0, 0, 'L');
        }

        /**
         * Numero de Biopsia
         */
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(25, 5, $this->ConvertCharacters->convert('No. de Biosia') .': ', 0, 0, 'L');

        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(30, 5, $data->created_at->format('Y') . "-" .$data->serial, 0, 0, 'L');

        /**
         * Salto
         */
        $pdf->ln();

        /**
         * Muestra Recibida
         */
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(30, 5, $this->ConvertCharacters->convert('Muestra Recibida') .': ', 0, 0, 'L');

        $pdf->SetFont('Helvetica', 'B', 10);
        if($data->fecha_muestra){
            $pdf->Cell(78, 5, $data->fecha_muestra->formatLocalized('%d/%m/%Y'), 0, 0, 'L');
        } else {
            $pdf->Cell(78, 5, " ", 0, 0, 'L');
        }

        /**
         * Numero de Factura
         */
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(25, 5, $this->ConvertCharacters->convert('No. Factura') . ': ', 0, 0, 'L');

        $pdf->SetFont('Helvetica', 'B', 10);
        $pdf->Cell(30, 5, $data->facturas->num_factura, 0, 0, 'L');
    }

}

































