<?php

namespace Acme\Controller\Printer\Bases;

use Crabbly\FPDF\Fpdf as baseFpdf;

class PDF extends baseFpdf
{

    var $javascript;
    var $n_js;
    protected $ftitle;
    protected $data;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4', $ftitle = "title", $data)
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;
        $this->data = $data;
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



// Page footer
    function Footer()
    {
        $this->SetY(-38);
        $this->Cell(45, 5, "Fecha de Informe:" , 0, '');
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(75, 5, $this->data->firma->name , 0, 0, 'C');
        if (isset($this->data->firma2)){
            $this->Cell(75, 5, $this->data->firma2->name , 0, 0, 'C');
        }
        $this->SetFont('Arial', '', 10);
        $this->ln();
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(45, 5, $this->data->fecha_informe->formatLocalized('%d/%m/%Y') , 0, '');
        $this->SetFont('Arial', '', 10);
        $this->Cell(75, 5, $this->data->firma->collegiate , 0, 0, 'C');
        if (isset($this->data->firma2)) {
            $this->Cell(75, 5, $this->data->firma2->collegiate, 0, 0, 'C');
        }
        if ($this->data->firma->extra){
            $this->ln();
            $this->Cell(45, 5, "" , 0, '');
            $this->Cell(75, 5, $this->data->firma->extra ,0, 0, 'C');
            if (isset($this->data->firma2->extra)){
                $this->pdf->Cell(75, 5, $this->data->firma2->extra , 0, 0, 'C');
            }
            $this->ln();
        }

        // Position at 1.5 cm from bottom
        $this->SetY(-25);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb} - Biopsia No.'. $this->ftitle,0,0,'L');
    }
}