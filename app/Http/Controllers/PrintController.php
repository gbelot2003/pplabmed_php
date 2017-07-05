<?php

namespace App\Http\Controllers;

use Acme\Controller\Printer\HistoPrinConfigEng;
use Acme\Controller\Printer\HistoPrintConfig;
use App\Citologia;
use App\Histopatologia;
use Barryvdh\DomPDF\PDF;
use Dedicated\GoogleTranslate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageCito', ['only' => ['sobresCitologia', 'formatoCitologia']]);
        $this->middleware('ManageHisto', ['only' => ['sobreHistopatologia', 'formatoHistopatologia']]);
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

    public function formatoCitologiasEng($id)
    {
        $items = Citologia::with('facturas')->findOrFail($id);
        $translator = new GoogleTranslate\Translator();

        if($items->diagnostico){
            $diagnostico = $translator->setSourceLang('es')
                ->setTargetLang('en')
                ->translate($items->diagnostico);
        } else {
            $diagnostico = null;
        }

        if($items->informe) {
            $informe = $translator->setSourceLang('es')
                ->setTargetLang('en')
                ->translate($items->informe);
        } else {
            $informe = null;
        }

        if($items->otros_b) {
            $material = $translator->setSourceLang('es')
                ->setTargetLang('en')
                ->translate($items->otros_b);
        } else {
            $material = null;
        }


        return View('resultados.impresiones.citoFormato_EN', compact('items', 'informe', 'diagnostico', 'material'));
    }

    public function sobreHistopatologia($id)
    {
        $items = Histopatologia::with('facturas')->findOrFail($id);
        return View('resultados.impresiones.histoSobre', compact('items'));
    }

    public function formatoHistopatologia($id)
    {
        $items = Histopatologia::with('facturas')->findOrFail($id);
        $print = new HistoPrintConfig();
        $print->printPdfHitoReport($items);
    }

    public function formatoHistoatologiaEng($id)
    {
        $items = Histopatologia::with('facturas')->findOrFail($id);
        $print = new HistoPrinConfigEng();
        $print->printPdfHitoReport($items);
    }


}
