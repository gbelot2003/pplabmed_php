<?php

namespace App\Http\Controllers\Reportes;

use Acme\Controller\Printer\Reportes\EstadisticasMorfologicas;
use App\Http\Controllers\Controller;
use Atlas\Reports\Patologia\ReporteMorfologicoQuery;
use Illuminate\Http\Request;

class ReporteMorfologicoController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
    }


    public function index()
    {
        return View('reportes.histo.morfologias.index');
    }

    public function results(Request $request)
    {
        $query = new ReporteMorfologicoQuery();
        list($items, $bdate, $edate) = $query->queryBuilder($request);

        $morfo = new EstadisticasMorfologicas();
        $morfo->printPdfHitoReport($items, $bdate, $edate);
        //return View('reportes.histo.morfologias.results', compact('items', 'bdate', 'edate'));
    }
}