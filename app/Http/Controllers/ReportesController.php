<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Citologia;
use App\Factura;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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


        if($request['icitologia_id'] == null){
            $idCito = 'null';
        } else {
            $idCito = $request->input('icitologia_id');
        }

        if($request['direccion'] == null){
            $direccion = 'null';
        } else {
            $direccion = $request->input('direccion');
        }


        return redirect()->to('/reportes/hoja-de-citologia-resultados/'.$inicio.'/'.$fin.'/'.$idCito.'/'.$direccion);
        //return redirect()->to('//reportes/hoja-de-citologia-resultados/'.$inicio.'/'.$fin.'/'.$idC.'');
    }

    public function resultHojaCito($inicio, $final, $idCito, $direccion)
    {

        $bdate =  Carbon::createFromFormat('Y-m-d', $inicio)->startOfDay();
        $edate =  Carbon::createFromFormat('Y-m-d', $final)->endOfDay();
        $id = $idCito;
        $direc = $direccion;

        $query = Citologia::with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);

        if($id != 'null'){
            $query->where('icitologia_id', $id);
        }

        if($direc != 'null'){
            $query->whereHas('facturas', function($q) use ($direc){
                $q->where('direccion_entrega_sede', 'like', '%' . $direc . '%');
            });
        }

        $items = $query->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('reportes.citologia.CitoResultPdf', compact('items', 'bdate', 'edate'));
        return $pdf->stream();
        //return View('reportes.citologia.hojaCitoResultados', compact('items', 'bdate', 'edate'));

    }

    public function resultPdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream('invoice.pdf');
    }




}
