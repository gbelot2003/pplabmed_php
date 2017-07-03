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
use Maatwebsite\Excel\Facades\Excel;


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
        $cito1 = new Citologia();
        $cito2 = new Citologia();
        $histo1 = new Histopatologia();
        $histo2 = new Histopatologia();

        if ($request->has('inicio')) {
            $date = new DatesFormatHelper($request->get('inicio'));
            $b_date = $date->setDate();
        }

        if ($request->has('final')) {
            $date = new DatesFormatHelper($request->get('final'));
            $e_date = $date->setDate();
        }

        if (isset($b_date) && isset($e_date)) {
            list($bdate, $edate) = $this->formatQuery->formatQueryDates($b_date, $e_date);
        }


        $firma = Firma::findOrFail($request->get('firma_id'));

        $citologias = $cito1->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate])
            ->where('firma_id', $request->get('firma_id'))
            ->orWhere('firma2_id', $request->get('firma_id'));

        $fir1 = $citologias->get();
        $fir1total = $citologias->count();


        /*$f1 = $cito1->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate])
            ->where('firma_id', $request->get('firma_id'))->count();

        $f2 = $cito2->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate])
            ->where('firma2_id', $request->get('firma_id'))->count();

        $f3 = $histo1->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate])
            ->where('firma_id', $request->get('firma_id'))->count();

        $f4 = $histo2->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate])
            ->where('firma2_id', $request->get('firma_id'))->count();

        $total = ($f1 + $f2 +  $f3 + $f4);*/

        $return = Excel::create('Reporte de Medicos Informantes', function ($excel) use ($fir1) {
            $excel->sheet('Sheet 1', function ($sheet) use ($fir1) {
                $sheet->fromArray($fir1);
            });
        })->export('xls');

        /*return [
            'citologias' => $fir1,
            'citologias_total' => $fir1total
        ];*/
        //return View('reportes.medicos.results', compact('fir1', 'f1', 'f2', 'f3', 'f4', 'bdate', 'edate', 'total', 'firma'));

    }
}