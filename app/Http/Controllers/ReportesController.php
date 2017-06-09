<?php

namespace App\Http\Controllers;

use App\Histopatologia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function morfologiaForm()
    {
        return View('reportes.histo.morfologiaForm');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function morfologiaProcess(Request $request)
    {
        $inicio = $request->input('inicio');
        $fin = $request->input('final');
        $request->get('mor1') ? $mor1 = $request->get('mor1') : $mor1 = 'null';
        $request->get('mor2') ? $mor2 = $request->get('topog') : $mor2 = 'null';
        $request->get('topog') ? $topo = $request->get('topog') : $topo = 'null';
        $request->get('pdf') ? $pdf = $request->get('pdf') : $pdf = 'null';

        return redirect()->to('reportes/reporte-morfologia/resultado/' . $inicio . '/' . $fin . '/' . $mor1 . '/' . $mor2 . '/' . $topo . '/' . $pdf);
    }

    public function morfologiaResult($inicio, $final, $mor1, $mor2, $topo, $pdf)
    {
        $bdate = Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $final)->endOfDay();

        $query = Histopatologia::with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);

        if ($mor1 != 'null') {
            $query->where('mor1', $mor1);
        }

        if ($mor2 != 'null') {
            $query->where('mor2', $mor2);
        }

        if ($topo != 'null') {
            $query->where('topog', $topo);
        }

        $items = $query->get();

        if ($pdf === 'null') {
            return View('reportes.histo.morfologiaResult', compact('items', 'bdate', 'edate'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.histo.morfologiaResultPdf', compact('items', 'bdate', 'edate'));
            return $pdf->stream();
        }
    }

}
