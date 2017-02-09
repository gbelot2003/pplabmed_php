<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    //

    public function index()
    {

    }

    public function show($id)
    {
        $item = Factura::where('num_factura', $id)->first();
        return $item;
    }
}
