<?php

namespace App\Http\Controllers\Reportes;

use Acme\Controller\Printer\Reportes\SedeEntrega;
use App\Factura;
use App\Http\Controllers\Controller;
use Atlas\Reports\Sedes\HojaTrabajoCedesQuery;
use Illuminate\Http\Request;

class ReportePorSedeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->factura = new Factura();
    }

    public function index()
    {
        $direc = $this->factura->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return View('reportes.reporteDeparamentos.index', ['direc' => $direc]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function results(Request $request)
    {
        $query = new HojaTrabajoCedesQuery();
        list($items, $bdate, $edate, $total, $direccion) = $query->queryBuilder($request);

        $print = new SedeEntrega();
        //return array($items, $bdate, $edate, $total, $direccion);

        return $print->printPdfHitoReport($items, $bdate, $edate, $total, $direccion);
    }
}