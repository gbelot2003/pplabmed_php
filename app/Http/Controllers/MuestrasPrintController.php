<?php

namespace App\Http\Controllers;

use Acme\Controller\Printer\ConstanciaPrint;
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
        return "print ENG";
    }

}
