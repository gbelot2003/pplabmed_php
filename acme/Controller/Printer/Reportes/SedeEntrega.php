<?php


namespace Acme\Controller\Printer\Reportes;

class SedeEntrega
{
    function __construct()
    {
        $this->ConvertCharacters = new PdfStringConversor();
    }

    public function printPdfHitoReport($data, $bdate, $edate)
    {

    }
}