<?php

namespace App\Http\Controllers\Reportes;

use App\Citologia;
use App\Firma;
use App\Histopatologia;
use App\Http\Controllers\Controller;
use Atlas\Helpers\DatesFormatHelper;
use Atlas\Helpers\FormatQueryDates;
use Carbon\Carbon;
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
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes

        $cito1 = new Citologia();
        $cito2 = new Citologia();
        $histo1 = new Histopatologia();
        $histo2 = new Histopatologia();
        $firma = Firma::findOrFail($request->get('firma_id'));


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



        $citologias = Citologia::select([
            'facturas.num_factura as Numero_Factura',
            'examenes.item as Numero_Item',
            'examenes.nombre_examen as Tipo_Examen',
            'facturas.nombre_completo_cliente as Nombre_Cliente',
            'facturas.total_factura as total_factura',
            'citologias.fecha_informe',
            'citologias.created_at'
        ])
            ->whereBetween('citologias.created_at', [$bdate, $edate])
            ->where('firma_id', $firma->id)
            ->join('facturas', 'citologias.factura_id', '=', 'facturas.num_factura')
            ->join('examenes', 'facturas.num_factura', '=', 'examenes.num_factura');


        $items = $citologias->get();
        $fir1total = $citologias->count();


        $citologias2 = Citologia::select([
            'facturas.num_factura as Numero_Factura',
            'examenes.item as Numero_Item',
            'examenes.nombre_examen as Tipo_Examen',
            'facturas.nombre_completo_cliente as Nombre_Cliente',
            'facturas.total_factura as total_factura',
            'citologias.fecha_informe',
            'citologias.created_at'
        ])
            ->whereBetween('citologias.created_at', [$bdate, $edate])
            ->where('firma2_id', $firma->id)
            ->join('facturas', 'citologias.factura_id', '=', 'facturas.num_factura')
            ->join('examenes', 'facturas.num_factura', '=', 'examenes.num_factura');


        $items2 = $citologias2->get();
        $fir2total = $citologias2->count();
        $citoTotal = $fir1total + $fir2total;


        $histo = $histo1->select([
            'facturas.num_factura as Numero_Factura',
            'examenes.item as Numero_Item',
            'examenes.nombre_examen as Tipo_Examen',
            'facturas.nombre_completo_cliente as Nombre_Cliente',
            'facturas.total_factura as total_factura',
            'histopatologias.fecha_informe',
            'histopatologias.created_at'
        ])
            ->whereBetween('facturas.created_at', [$bdate, $edate])
            ->where('firma_id',$firma->id)
            ->join('facturas', 'histopatologias.factura_id', '=', 'facturas.num_factura')
            ->join('examenes', 'facturas.num_factura', '=', 'examenes.num_factura');

        $items3 = $histo->get();
        $fir3total = $histo->count();


        $histo2 = $histo1->select([
            'facturas.num_factura as Numero_Factura',
            'examenes.item as Numero_Item',
            'examenes.nombre_examen as Tipo_Examen',
            'facturas.nombre_completo_cliente as Nombre_Cliente',
            'facturas.total_factura as total_factura',
            'histopatologias.fecha_informe',
            'histopatologias.created_at'
        ])
            ->whereBetween('facturas.created_at', [$bdate, $edate])
            ->where('firma2_id',$firma->id)
            ->join('facturas', 'histopatologias.factura_id', '=', 'facturas.num_factura')
            ->join('examenes', 'facturas.num_factura', '=', 'examenes.num_factura');

        $items4 = $histo2->get();
        $fir4total = $histo2->count();
        $histoTotal = $fir3total + $fir4total;

        $return = Excel::create('Reporte de Medicos Informantes ' . $firma->name, function ($excel) use ($items, $items2, $items3, $items4,
            $bdate, $edate, $firma, $citoTotal, $fir2total, $items2, $histoTotal) {

            $excel->sheet('Citologías', function ($sheet) use ($items, $items2, $bdate, $edate, $firma, $citoTotal) {
                $sheet->loadView('reportes.medicos.results', compact('bdate', 'edate', 'items', 'firma', 'citoTotal', 'items2'));
            });

            $excel->sheet('Histopatología', function ($sheet) use ($items3, $items4, $bdate, $edate, $firma, $histoTotal) {
                $sheet->loadView('reportes.medicos.results-histo', compact('bdate', 'edate', 'items3', 'items4', 'firma', 'histoTotal'));
            });


        })->export('xls');

    }
}