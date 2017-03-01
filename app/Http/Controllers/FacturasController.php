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
        $facturas = Factura::all();
        return View('resultados.facturas.index', compact('facturas'));
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        return View('resultados.facturas.edit', compact('factura'));
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
