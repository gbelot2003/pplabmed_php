<?php

namespace Acme\Controller\Printer\Bases;

use Elibyy\TCPDF\TCPDFHelper as baseFpdf;

class PDFConstancia extends baseFpdf
{
    var $javascript;
    var $n_js;
    protected $ftitle;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'Letter', $ftitle = "title")
    {
        parent::__construct($orientation, $unit, $size);
        $this->ftitle = $ftitle;
    }

    // Page footer
}