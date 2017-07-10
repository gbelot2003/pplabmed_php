<?php

namespace App\Http\Controllers;

use Acme\Controller\Printer\ConstanciaPrint;
use Acme\Controller\Printer\ConstanciaPrintEng;
use App\Muestra;
use Illuminate\Http\Request;

class MuestrasPrintController extends Controller
{
    function __construct()
    {
    }

    /**
     *
     */
    public function printMuestras($id)
    {
        $muestra = Muestra::findOrFail($id);
        $print = new ConstanciaPrint();

        $print->printPdfReport($muestra);

    }


    /**
     *
     */
    public function printMuestrasEng($id)
    {
        $muestra = Muestra::findOrFail($id);
        $print = new ConstanciaPrintEng();
        $print->printPdfReport($muestra);
    }

}
