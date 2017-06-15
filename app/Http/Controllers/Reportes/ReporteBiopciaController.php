<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\Biopsias\HojaTrabajoBuild;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factura;

class ReporteBiopciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->model = new Factura();

    }

    public function index()
    {
        $direccion = $this->model->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return View('reportes.histo.hojaTrabajo.index', ['direc' => $direccion]);
    }

    public function results(Request $request)
    {
        $build = new HojaTrabajoBuild($this->model, $request);
        return $build->buildCall($request);
    }
}