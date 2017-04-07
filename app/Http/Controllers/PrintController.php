<?php

namespace App\Http\Controllers;

use App\Citologia;
use App\Histopatologia;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
    }

    public function sobresCitologia($id)
    {
        $items = Citologia::with('facturas')->findOrFail($id);
        return View('resultados.impresiones.citoSobres', compact('items'));
    }

    public function formatoCitologia($id)
    {
        $items = Citologia::with('facturas')->findOrFail($id);
        return View('resultados.impresiones.citoFormato', compact('items'));
    }

    public function sobreHistopatologia($id)
    {
        $items = Histopatologia::with('facturas')->findOrFail($id);
        return View('resultados.impresiones.histoSobre', compact('items'));
    }

    public function formatoHistopatologia($id)
    {
        $items = Histopatologia::with('facturas')->findOrFail($id);
        return View('resultados.impresiones.histoFormato', compact('items'));
    }
}
