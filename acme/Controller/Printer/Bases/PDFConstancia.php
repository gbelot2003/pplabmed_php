<?php

namespace Acme\Controller\Printer\Bases;

use Crabbly\FPDF\Fpdf as baseFpdf;

class PDFConstancia extends baseFpdf
{
    var $javascript;
    var $n_js;
    protected $ftitle;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4', $ftitle = "title")
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;
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
}