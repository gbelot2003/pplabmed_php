<?php

namespace App\Http\Controllers\Reportes;


use App\Citologia;
use App\Firma;
use App\Histopatologia;
use App\Http\Controllers\Controller;
use Atlas\Helpers\DatesFormatHelper;
use Atlas\Helpers\FormatQueryDates;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportesMedicosHorasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->formatQuery = new FormatQueryDates();
    }

    public function index()
    {
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('reportes.medicos.index', compact('firmas'));
    }

    public function results(Request $request)
    {
        $cito1  = new Citologia();
        $cito2  = new Citologia();
        $histo1  = new Histopatologia();
        $histo2  = new Histopatologia();

        if($request->has('inicio'))
        {
            $date = new DatesFormatHelper($request->get('inicio'));
            $b_date = $date->setDate();
        }

        if($request->has('final'))
        {
            $date = new DatesFormatHelper($request->get('final'));
            $e_date = $date->setDate();
        }

        if(isset($b_date) && isset($e_date)){
            list($bdate, $edate) = $this->formatQuery->formatQueryDates($b_date, $e_date);
        }


        $f1 = $cito1->whereBetween('fecha_informe', [$bdate, $edate])->where('firma_id', $request->get('firma_id'))->count();
        $f2 = $cito2->whereBetween('fecha_informe', [$bdate, $edate])->where('firma2_id', $request->get('firma_id'))->count();

        $f3 = $histo1->whereBetween('fecha_informe', [$bdate, $edate])->where('firma_id', $request->get('firma_id'))->count();
        $f4 = $histo2->whereBetween('fecha_informe', [$bdate, $edate])->where('firma2_id', $request->get('firma_id'))->count();

        $total = ($f1 + $f2 +  $f3 + $f4);

        return [
            'citologias' => $f1,
            'citologias segunda firma' => $f2,
            'Biopsias firma' => $f3,
            'Biopsias segunda firma' => $f4,
            'total' => $total
        ];

    }
}