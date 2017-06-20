<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\ReporteMuestraBuild;
use App\Http\Controllers\Controller;
use Atlas\Reports\Patologia\HojaMuestrasQuery;
use Illuminate\Http\Request;

class ReporteMuestrasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');

    }

    public function index()
    {
        return View('reportes.histo.reporteMuestra.index');
    }

    public function results(Request $request)
    {
        $query = new HojaMuestrasQuery();
        list($items, $bdate, $edate) = $query->queryBuilder($request);

        return View('reportes.histo.reporteMuestra.results', compact('items','bdate', 'edate'));
    }

}