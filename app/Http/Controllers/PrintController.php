<?php

namespace App\Http\Controllers;

use Acme\Controller\Printer\Bases\PDFImges;
use Acme\Controller\Printer\Formulario\HistoForm1;
use Acme\Controller\Printer\Formulario\HistoForm1Eng;
use Acme\Controller\Printer\Formulario\HistoForm1EngImage;
use Acme\Controller\Printer\Formulario\HistoForm2;
use App\Citologia;
use App\CitologiasEng;
use App\Histopatologia;
use App\HistopatologiasEng;
use Stichoza\GoogleTranslate\TranslateClient as GoogleTranslate;


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
        $items = CitologiasEng::with('facturas')->findOrFail($id);
        $translator = new GoogleTranslate();

        if ($items->diagnostico) {
            $diagnostico = $translator->setSource('es')
                ->setTarget('en')
                ->translate($items->diagnostico);
        } else {
            $diagnostico = null;
        }

        if ($items->informe) {
            $informe = $translator->setSource('es')
                ->setTarget('en')
                ->translate($items->informe);
        } else {
            $informe = null;
        }

        if ($items->otros_b) {
            $material = $translator->setSource('es')
                ->setTarget('en')
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

        if (isset($items->images[0])) {
            $print = new HistoForm2();
            $print->printPdfHitoReport($items);
        } else {
            $print = new HistoForm1();
            $print->printPdfHitoReport($items);
        }

    }

    public function formatoHistoatologiaEng($id)
    {
        $items = HistopatologiasEng::with('facturas')->findOrFail($id);
        if (isset($items->images[0])) {
            $print = new HistoForm1EngImage();
            $print->printPdfHitoReport($items);
        } else {
            $print = new HistoForm1Eng();
            $print->printPdfHitoReport($items);
        }
    }


}
