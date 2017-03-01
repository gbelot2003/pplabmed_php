<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FacturasController extends Controller
{

    /**
     * @return View
     */
    public function index()
    {
        return View('resultados.facturas.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $item = Factura::where('num_factura', $id)->first();
        return $item;
    }
}
