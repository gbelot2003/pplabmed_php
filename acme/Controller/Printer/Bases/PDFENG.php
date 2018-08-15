<?php

namespace Acme\Controller\Printer\Bases;

use Acme\Helpers\PdfStringConversor;
use Elibyy\TCPDF\TCPDFHelper as baseFpdf;
use Stichoza\GoogleTranslate\TranslateClient as GoogleTranslate;

class PDFENG extends baseFpdf
{
    public $isLastPage = false;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4', $ftitle = "title", $data)
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
        $this->Cell(205, 10, $this->ConvertCharacters->convert("HISTOPATHOLOGY REPORT"), 0,  0, 'C');

        /**
         * Salto
         */
        $this->ln();

        /**
         * Nombre
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(22, 5, 'PATIENT: ', 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(118, 5, $this->ConvertCharacters->convert(strtoupper($this->data->facturas->nombre_completo_cliente)), 0, 0, 'L');

        /**
         * Edad
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(12, 5, 'AGE: ', 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(15, 5, $this->data->facturas->edad, 0, 0, 'L');

        /**
         * Sexo
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(12, 5, 'SEX: ', 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(15, 5, $this->data->facturas->sexo, 0, 0, 'L');

        /**
         * Salto
         */
        $this->ln();

        /**
         * Medico
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(22, 5, $this->ConvertCharacters->convert('DOCTOR: '), 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(118, 5, $this->ConvertCharacters->convert(strtoupper($this->data->facturas->medico)), 0, 0, 'L');

        /**
         * Fecha de Biopsia
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(30, 5, $this->ConvertCharacters->convert('DATE BIOPSY') .': ', 0, 0, 'L');

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
        $this->Cell(22, 5, $this->ConvertCharacters->convert('ADDRESS:'), 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(118, 5, $this->ConvertCharacters->convert($this->data->facturas->direccion_entrega_sede), 0, 0, 'L');


        /**
         * Muestra Recibida
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(30, 5, $this->ConvertCharacters->convert('RECEIVED:           '), 0, 0, 'R');

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
        $this->SetFont('Helvetica', '', 10);//Clinical Diagnosis
        $this->Cell(39, 5, $this->ConvertCharacters->convert('CLINICAL DIAGNOSIS') .':', 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(161, 5, $this->ConvertCharacters->convert(strtoupper($this->data->diagnostico)), 0, 'L', false);

        /**
         * Salto
         */
        $this->ln();

        /**
         * Material Estudiado
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(20, 5, $this->ConvertCharacters->convert('SPECIMEN') .': ', 0, 0, 'L');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(175  , 5, $this->ConvertCharacters->convert(strtoupper($this->data->muestra)), 0, 0, 'L');

        /**
         * Salto
         */
        $this->ln();


        /**
         * Numero de Biopsia
         */
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(165, 5, $this->ConvertCharacters->convert('No. BIOPSY') .': ', 0, 0, 'R');

        $this->SetFont('Helvetica', '', 10);
        $this->Cell(30, 5,  $this->data->serial. "-" .$this->data->fecha_informe->format('Y'), 0, 0, 'L');

        /**
         * Saltos
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

        if($this->isLastPage == true){
            $this->SetY(-58);
            $this->Cell(45, 5, "Report Date:" , 0, '');
            $this->SetFont('Helvetica', 'B', 11);

            $this->Cell($side, 5, $this->data->firma->name , 0, 0, 'C');

            if (isset($this->data->firma2)){
                $this->Cell(75, 5, $this->data->firma2->name , 0, 0, 'C');
            }
            $this->ln();

            $this->SetFont('Helvetica', 'B', 10);
            $this->Cell(45, 5, $this->data->fecha_informe->formatLocalized('%m/%d/%Y') , 0, '');

            $this->SetFont('Helvetica', '', 10);

            $translator = new GoogleTranslate();
            $colegiado1 = $translator->setSource('es')
                ->setTarget('en')
                ->translate($this->data->firma->collegiate);


            $this->Cell($side, 5, $colegiado1 , 0, 0, 'C');

            if (isset($this->data->firma2)) {
                $translator = new GoogleTranslate();
                $colegiado = $translator->setSource('es')
                    ->setTarget('en')
                    ->translate($this->data->firma2->collegiate);

                $this->Cell(75, 5, $colegiado, 0, 0, 'C');
            }
            if ($this->data->firma->extra){
                $this->ln();
                $this->Cell(45, 5, "" , 0, '');

                $translator = new GoogleTranslate();
                $extra1 = $translator->setSource('es')
                    ->setTarget('en')
                    ->translate($this->data->firma->extra);

                $this->Cell($side, 5, $extra1 ,0, 0, 'C');


                if (isset($this->data->firma2->extra)){

                    $translator = new GoogleTranslate();
                    $colegiadoX = $translator->setSource('es')
                        ->setTarget('en')
                        ->translate($this->data->firma2->extra);

                    $this->Cell(75, 5, $colegiadoX , 0, 0, 'C');
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
    }
}