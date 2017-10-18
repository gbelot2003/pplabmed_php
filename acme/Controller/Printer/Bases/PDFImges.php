<?php

namespace Acme\Controller\Printer\Bases;

use Acme\Helpers\PdfStringConversor;
use Elibyy\TCPDF\TCPDFHelper as baseFpdf;

class PDFImges extends baseFpdf
{

    public $isLastPage = false;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'letter', $ftitle = "title", $data)
    {
        parent::__construct($orientation, $unit, $size);
        $this->ConvertCharacters = new PdfStringConversor();
        $this->ftitle = $ftitle;
        $this->data = $data;
    }

    public function lastPage($resetmargins=false) {
        $this->setPage($this->getNumPages(), $resetmargins);
        $this->isLastPage = true;
    }

    function Header()
    {
        /**
         * Cabezera
         */
        $this->SetFont('Helvetica', '', 14);
        $this->Image(public_path() . "/img/head.jpg", 0, 0, 230, 28, '', '', '', true, 150, '', false, false, 0, false, false, false);
        $this->Cell(205, 10, "REPORTE DE HISTOPATOLOGÍA", 0,  0, 'C');

        /**
         * Salto
         */
        $this->ln();

        /**
         * Nombre
         */
        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(22, 5, 'PACIENTE: ', 0, 0, 'L');

        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(118, 5, strtoupper($this->data->facturas->nombre_completo_cliente), 0, 0, 'L');


        /**
         * Edad
         */
        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(12, 5, 'EDAD: ', 0, 0, 'L');

        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(15, 5, $this->data->facturas->edad, 0, 0, 'L');

        /**
         * Sexo
         */
        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(12, 5, 'SEXO: ', 0, 0, 'L');

        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(15, 5, $this->data->facturas->sexo, 0, 0, 'L');

        /**
         * Salto
         */
        $this->ln();

        /**
         * Medico
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(22, 5, 'MÉDICO: ', 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(118, 5, strtoupper($this->data->facturas->medico), 0, 0, 'L');

        /**
         * Fecha de Biopsia
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(30, 5, $this->ConvertCharacters->convert('FECHA BIOPSIA') .': ', 0, 0, 'L');

        if($this->data->fecha_biopcia){
            $this->SetFont('Helvetica', '', 10);
            $this->Cell(20, 5, $this->data->fecha_biopcia->formatLocalized('%d/%m/%Y'), 0, 0, 'L');
        }


        /**
         * Salto
         */
        $this->ln();

        /**
         * Dirección
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(22, 5, 'DIRECCIÓN:', 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(118, 5,strtoupper($this->data->facturas->direccion_entrega_sede), 0, 0, 'L');


        /**
         * Muestra Recibida
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(30, 5, $this->ConvertCharacters->convert('RECIBIDA:'), 0, 0, 'R');

        $this->SetFont('Helvetica', '', 10);
        if($this->data->fecha_muestra){
            $this->Cell(78, 5, $this->data->fecha_muestra->formatLocalized('%d/%m/%Y'), 0, 0, 'L');
        } else {
            $this->Cell(125, 5, " ", 0, 0, 'L');
        }


        /**
         * Salto
         */
        $this->ln();

        /**
         * Diagnostico
         */

        $this->SetFont('Helvetica', 'B', 10);
        $this->setXY(5, 53);
        $this->Cell(26, 5,'DIAG. CLÍNICO: ', 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        //$this->setXY(32, 53);
        $this->MultiCell(171, 3, strtoupper(substr($this->data->diagnostico, 0, 114)),0, 'L', 0, 1, 32, 53, false, 0, false, true, '', 'B');
        /**
         * Salto
         */
        $this->ln();

        /**
         * Material Estudiado
         */
        $this->setY(62);
        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(41, 5, $this->ConvertCharacters->convert('MATERIAL ESTUDIADO') .': ', 0, 0, 'L', 0, 1, 32, 53, false, 0, false, true, '', 'B');

        $this->SetFont('Helvetica', '', 10);
        $this->setX(47);
        $this->MultiCell(156  , 5, strtoupper(substr($this->data->muestra, 0, 114)), 0, 'L', false);

        /**
         * Salto
         */
        $this->ln();


        /**
         * Numero de Biopsia
         */
        $this->setY(70);

        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(165, 5, $this->ConvertCharacters->convert('No. BIOPSIA') .': ', 0, 0, 'R');

        $this->SetFont('Helvetica', 'B', 12);
        $this->Cell(30, 5,  $this->data->serial. "-" .$this->data->created_at->format('Y'), 0, 0, 'L');

        /**
         * Salto
         */
        $this->ln();

        /**
         * Numero de Factura
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(165, 5, $this->ConvertCharacters->convert('C.I.') . ' ', 0, 0, 'R');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(30, 5, $this->data->facturas->num_factura, 0, 0, 'L');
        $this->ln();
        $this->writeHTML("<hr>", true, false, false, false, '');
    }


// Page footer
    function Footer()
    {
        if(!isset($this->data->firma2)){
            $side = 120;
        } else {
            $side = 75;
        }

        if($this->isLastPage) {
            $this->SetY(-58);
            $this->Cell(45, 5, "Fecha de Informe:" , 0, '');
            $this->SetFont('Helvetica', 'B', 11);

            $this->Cell($side, 5, $this->data->firma->name , 0, 0, 'C');

            if (isset($this->data->firma2)){
                $this->Cell(75, 5, $this->data->firma2->name , 0, 0, 'C');
            }
            $this->ln();

            $this->SetFont('Helvetica', 'B', 10);
            $this->Cell(45, 5, $this->data->fecha_informe->formatLocalized('%d/%m/%Y') , 0, '');

            $this->SetFont('Helvetica', '', 10);
            $this->Cell($side, 5, $this->data->firma->collegiate , 0, 0, 'C');
            if (isset($this->data->firma2)) {
                $this->Cell(75, 5, $this->data->firma2->collegiate, 0, 0, 'C');
            }
            if ($this->data->firma->extra){
                $this->ln();
                $this->Cell(45, 5, "" , 0, '');
                $this->Cell($side, 5, $this->data->firma->extra ,0, 0, 'C');
                if (isset($this->data->firma2->extra)){
                    $this->Cell(75, 5, $this->data->firma2->extra , 0, 0, 'C');
                }
                $this->ln();
            }
        }

        // Position at 1.5 cm from bottom
        $this->SetY(-51);
        // Helvetica italic 8
        $this->SetFont('Helvetica','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages().' - Biopsia No.'. $this->ftitle, 0,0,'L', 0, '', 0, false, 'T', 'M');
        $this->Image(public_path() . "/img/footer.jpg", 0, 255, 215, 28, '', '', '', true, 150, '', false, false, 0, false, false, false);
    }
}