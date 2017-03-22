<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Citologia;
use App\Factura;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{

    public function hojaCitoForm()
    {

        $idCito = Categoria::where('status', 1)->pluck('name', 'id');
        $direc = Factura::groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return View('reportes.citologia.hojaCitoForm', compact('idCito', 'direc'));
    }

    public function processHojaTrabajo(Request $request)
    {

        $inicio = $request->input('inicio');
        $fin = $request->input('final');

        $idCito = $request->get('icitologia_id') ? $request->get('icitologia_id') : 'null';
        $direccion = $request->get('direccion') ? $request->get('direccion') : 'null';
        $pdf = $request->get('pdf') ? $request->get('pdf') : 'null';


        return redirect()->to('/reportes/hoja-de-citologia-resultados/' . $inicio . '/' . $fin . '/' . $idCito . '/' . $direccion . '/' . $pdf);
        //return redirect()->to('//reportes/hoja-de-citologia-resultados/'.$inicio.'/'.$fin.'/'.$idC.'');
    }

    public function resultHojaCito($inicio, $final, $idCito, $direccion, $pdf)
    {

        $bdate = Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $final)->endOfDay();
        $id = $idCito;
        $direc = $direccion;

        $query = Citologia::with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);

        if ($id != 'null') {
            $query->where('icitologia_id', $id);
        }

        if ($direc != 'null') {
            $query->whereHas('facturas', function ($q) use ($direc) {
                $q->where('direccion_entrega_sede', 'like', '%' . $direc . '%');
            });
        }

        $items = $query->get();
        if ($pdf == 'null') {
            return View('reportes.citologia.hojaCitoResultados', compact('items', 'bdate', 'edate'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.citologia.CitoResultPdf', compact('items', 'bdate', 'edate'));
            return $pdf->stream();
        }
    }


    public function hojaCitoDeptoForm()
    {
        $direc = Factura::groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return View('reportes.citologia.hojaCitoDeptoForm', compact('idCito', 'direc'));
    }


    public function hojaCitoDeptoProcess(Request $request)
    {
        $inicio = $request->input('inicio');
        $fin = $request->input('final');
        $direccion = $request->get('direccion') ? $request->get('direccion') : 'null';
        $pdf = $request->get('pdf') ? $request->get('pdf') : 'null';

        return redirect()->to('/reportes/hoja-de-citologia-resultados-agencias/' . $inicio . '/' . $fin . '/' . $direccion . '/' . $pdf);
    }

    public function hojaCitoDeptoResults($inicio, $final, $direccion, $pdf)
    {
        $bdate = Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $final)->endOfDay();
        $direc = $direccion;

        $query = Citologia::with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);

        if ($direc != 'null') {
            $query->whereHas('facturas', function ($q) use ($direc) {
                $q->where('direccion_entrega_sede', 'like', '%' . $direc . '%');
            });
        }

        $items = $query->get();
        if ($pdf == 'null') {
            return View('reportes.citologia.hojaCitoResultadosSede', compact('items', 'bdate', 'edate'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.citologia.CitoResultPdf', compact('items', 'bdate', 'edate'));
            return $pdf->stream();
        }
    }

    public function identificadorCito()
    {
        return View('reportes.citologia.identificadorForm', compact('idCito', 'direc'));
    }

    public function identificadorProcess(Request $request)
    {
        $inicio = $request->input('inicio');
        $fin = $request->input('final');

        return redirect()->to('/reportes/identificador-citologia-resultados/' . $inicio . '/' . $fin );
    }

    public function identificadorResults($inicio, $final)
    {
        $bdate = Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $final)->endOfDay();

        $query = Citologia::whereBetween('fecha_informe', [$bdate, $edate]);

        $query->select(DB::raw('COUNT(icitologia_id) as counter, categorias.name, categorias.id as catId'));

        $query->join('categorias', 'icitologia_id', '=', 'categorias.id');

        $query->groupBy('icitologia_id');

        $query->orderby('categorias.id', 'ASC');

        $items = $query->get();
        $total = Citologia::whereBetween('fecha_informe', [$bdate, $edate])->count();

        return View('reportes.citologia.identificadorResults', compact('items', 'total', 'bdate', 'edate'));
    }


}
