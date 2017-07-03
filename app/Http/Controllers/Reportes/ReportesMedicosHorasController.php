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
        $histo1 = new Histopatologia();

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


        $citologias = $cito1->select([
            'facturas.num_factura as Numero_Factura',
            'examenes.item as Numero_Item',
            'examenes.nombre_examen as Tipo_Examen',
            'facturas.nombre_completo_cliente as Nombre_Cliente',
            'citologias.fecha_informe'
        ])
            ->whereBetween('fecha_informe', [$bdate, $edate])
            ->where('firma_id', $request->get('firma_id'))
            ->orWhere('firma2_id', $request->get('firma_id'))
            ->join('facturas', 'citologias.factura_id', '=', 'facturas.num_factura')
            ->join('examenes', 'facturas.num_factura', '=', 'examenes.num_factura');


        $histo = $histo1->select([
            'facturas.num_factura as Numero_Factura',
            'examenes.item as Numero_Item',
            'examenes.nombre_examen as Tipo_Examen',
            'facturas.nombre_completo_cliente as Nombre_Cliente',
            'histopatologias.fecha_informe'
        ])
            ->whereBetween('fecha_informe', [$bdate, $edate])
            ->where('firma_id', $request->get('firma_id'))
            ->orWhere('firma2_id', $request->get('firma_id'))
            ->join('facturas', 'histopatologias.factura_id', '=', 'facturas.num_factura')
            ->join('examenes', 'facturas.num_factura', '=', 'examenes.num_factura');


        $items = $citologias->get();

        $fir1total = $citologias->count();

        $items2 = $histo->get();

        $fir2total = $histo->count();


        $return = Excel::create('Reporte de Medicos Informantes', function ($excel) use ($items, $bdate, $edate, $firma, $fir1total, $fir2total, $items2) {

            $excel->sheet('Citologías', function ($sheet) use ($items, $bdate, $edate, $firma, $fir1total) {
                $sheet->loadView('reportes.medicos.results', compact('bdate', 'edate', 'items', 'firma', 'fir1total'));
            });

            $excel->sheet('Histopatología', function ($sheet) use ($items2, $bdate, $edate, $firma, $fir2total) {
                $sheet->loadView('reportes.medicos.results-histo', compact('bdate', 'edate', 'items2', 'firma', 'fir2total'));
            });


        })->export('xls');

        /*return [
            'citologias' => $fir1,
            'citologias_total' => $fir1total
        ];*/

        //return View('reportes.medicos.results', compact( 'bdate', 'edate', 'items', 'firma'));

    }
}