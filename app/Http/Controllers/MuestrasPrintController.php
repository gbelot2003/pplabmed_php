<?php

namespace App\Http\Controllers;

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
        return "print";
    }


    /**
     *
     */
    public function printMuestrasEng($id)
    {
        return "print ENG";
    }

}
