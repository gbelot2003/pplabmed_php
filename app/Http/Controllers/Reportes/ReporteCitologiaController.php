<?php

namespace App\Http\Controllers\Reportes;

use Acme\Controller\Printer\Reportes\CitologiaHojaTrabajo;
use App\Http\Controllers\Controller;
use Atlas\Reports\Citologias\HojasTrabajoCitologiaQuery;
use Illuminate\Http\Request;
use App\Categoria;
use App\Factura;

class ReporteCitologiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->model = new Factura();
        $this->categoria = new Categoria();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $idCito = $this->categoria->where('status', 1)->pluck('name', 'id');
        $direc = $this->model->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return View('reportes.citologia.hojaTrabajo.index', compact('idCito', 'direc'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function results(Request $request)
    {
        $query = new HojasTrabajoCitologiaQuery();
        list($items, $bdate, $edate) = $query->queryBuilder($request);

        $print = new CitologiaHojaTrabajo();
        return $print->printPdfHitoReport($items, $bdate, $edate);
    }
}

