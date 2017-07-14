<?php

namespace Acme\Controller\Printer\Bases;

use Acme\Helpers\PdfStringConversor;
use Crabbly\FPDF\Fpdf as baseFpdf;
use Dedicated\GoogleTranslate;


class PDFENG extends baseFpdf
{
    var $javascript;
    var $n_js;
    protected $ftitle;
    protected $data;
    protected $last_page_flag;
    protected $ConvertCharacters;
    protected $diagnostico;
    protected $infome;
    protected $muestra;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4', $ftitle = "title", $data, $diagnostico, $informe, $muestra)
    {
        parent::__construct($orientation, $unit, $size);
        $this->ConvertCharacters = new PdfStringConversor();
        $this->ftitle = $ftitle;
        $this->data = $data;
        $this->diagnostico = $diagnostico;
        $this->infome = $informe;
        $this->muestra = $muestra;
    }

    function IncludeJS($script) {
        $this->javascript=$script;
    }

    function _putjavascript() {
        $this->_newobj();
        $this->n_js=$this->n;
        $this->_out('<<');
        $this->_out('/Names [(EmbeddedJS) '.($this->n+1).' 0 R]');
        $this->_out('>>');
        $this->_out('endobj');
        $this->_newobj();
        $this->_out('<<');
        $this->_out('/S /JavaScript');
        $this->_out('/JS '.$this->_textstring($this->javascript));
        $this->_out('>>');
        $this->_out('endobj');
    }

    function _putresources() {
        parent::_putresources();
        if (!empty($this->javascript)) {
            $this->_putjavascript();
        }
    }

    function _putcatalog() {
        parent::_putcatalog();
        if (!empty($this->javascript)) {
            $this->_out('/Names <</JavaScript '.($this->n_js).' 0 R>>');
        }
    }


    public function Close() {
        $this->last_page_flag = true;
        parent::Close();
    }

    function Header()
    {
        /**
         * Cabezera
         */
        $this->SetFont('Arial', '', 14);
        $this->Cell(205, 10, $this->ConvertCharacters->convert("HISTOPATHOLOGY REPORT"), 0,  0, 'C');

        /**
         * Salto
         */
        $this->ln();

        /**
         * Nombre
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(22, 5, 'PATIENT: ', 0, 0, 'L');

        $this->SetFont('Arial', '', 10);
        $this->Cell(118, 5, $this->ConvertCharacters->convert(strtoupper($this->data->facturas->nombre_completo_cliente)), 0, 0, 'L');

        /**
         * Edad
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(12, 5, 'AGE: ', 0, 0, 'L');

        $this->SetFont('Arial', '', 10);
        $this->Cell(15, 5, $this->data->facturas->edad, 0, 0, 'L');

        /**
         * Sexo
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(12, 5, 'SEX: ', 0, 0, 'L');

        $this->SetFont('Arial', '', 10);
        $this->Cell(15, 5, $this->data->facturas->sexo, 0, 0, 'L');

        /**
         * Salto
         */
        $this->ln();

        /**
         * Medico
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(22, 5, $this->ConvertCharacters->convert('DOCTOR: '), 0, 0, 'L');

        $this->SetFont('Arial', '', 10);
        $this->Cell(118, 5, $this->ConvertCharacters->convert(strtoupper($this->data->facturas->medico)), 0, 0, 'L');

        /**
         * Fecha de Biopsia
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(30, 5, $this->ConvertCharacters->convert('DATE BIOPSY') .': ', 0, 0, 'L');

        if($this->data->fecha_biopcia){
            $this->SetFont('Arial', '', 10);
            $this->Cell(20, 5, $this->data->fecha_biopcia->formatLocalized('%d/%m/%Y'), 0, 0, 'L');
        }


        /**
         * Salto
         */
        $this->ln();

        /**
         * Dirección
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(22, 5, $this->ConvertCharacters->convert('ADDRESS:'), 0, 0, 'L');

        $this->SetFont('Arial', '', 10);
        $this->Cell(118, 5, $this->ConvertCharacters->convert($this->data->facturas->direccion_entrega_sede), 0, 0, 'L');


        /**
         * Muestra Recibida
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(30, 5, $this->ConvertCharacters->convert('RECEIVED:'), 0, 0, 'R');

        $this->SetFont('Arial', '', 10);
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
        $this->SetFont('Arial', '', 10);
        $this->Cell(26, 5, $this->ConvertCharacters->convert('DIAG. CLINICAL') .': ', 0, 0, 'L');

        $this->SetFont('Arial', '', 10);
        $this->Cell(171, 5, $this->ConvertCharacters->convert(strtoupper($this->diagnostico)), 0, 'L', false);

        /**
         * Salto
         */
        $this->ln();

        /**
         * Material Estudiado
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(41, 5, $this->ConvertCharacters->convert('STUDIED MATERIAL') .': ', 0, 0, 'L');

        $this->SetFont('Arial', '', 10);
        $this->Cell(121  , 5, $this->ConvertCharacters->convert(strtoupper($this->muestra)), 0, 0, 'L');

        /**
         * Salto
         */
        $this->ln();


        /**
         * Numero de Biopsia
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(165, 5, $this->ConvertCharacters->convert('No. BIOPSY') .': ', 0, 0, 'R');

        $this->SetFont('Arial', '', 10);
        $this->Cell(30, 5,  $this->data->serial. "-" .$this->data->created_at->format('Y'), 0, 0, 'L');

        /**
         * Salto
         */
        $this->ln();

        /**
         * Numero de Factura
         */
        $this->SetFont('Arial', '', 10);
        $this->Cell(165, 5, $this->ConvertCharacters->convert('C.I.') . ' ', 0, 0, 'R');

        $this->SetFont('Arial', '', 10);
        $this->Cell(30, 5, $this->data->facturas->num_factura, 0, 0, 'L');
    }


// Page footer
    function Footer()
    {


        if(!isset($this->data->firma2)){
            $side = 120;
        } else {
            $side = 75;
        }

        if($this->last_page_flag == true){
            $this->SetY(-30);
            $this->Cell(45, 5, "Report Date:" , 0, '');
            $this->SetFont('Arial', 'B', 11);

            $this->Cell($side, 5, $this->data->firma->name , 0, 0, 'C');

            if (isset($this->data->firma2)){
                $this->Cell(75, 5, $this->data->firma2->name , 0, 0, 'C');
            }
            $this->ln();

            $this->SetFont('Arial', 'B', 10);
            $this->Cell(45, 5, $this->data->fecha_informe->formatLocalized('%d/%m/%Y') , 0, '');

            $this->SetFont('Arial', '', 10);
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
        $this->SetY(-24);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb} - Biopsia No.'. $this->ftitle,0,0,'L');
    }
}