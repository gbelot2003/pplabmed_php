<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\Citologia\HojaTrabajoBuild;
use App\Citologia;
use App\Http\Controllers\Controller;
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
        $this->model = new Citologia();
        $this->categoria = new Categoria();
        $this->factura = new Factura();

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $idCito = $this->categoria->where('status', 1)->pluck('name', 'id');
        $direc = $this->factura->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return View('reportes.citologia.hojaTrabajo.index', compact('idCito', 'direc'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function results(Request $request)
    {
        $build = new HojaTrabajoBuild($this->model, $request);
        return $build->buildCall();
    }
}

