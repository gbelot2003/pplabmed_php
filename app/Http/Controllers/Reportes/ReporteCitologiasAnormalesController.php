<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\CitologiasAnormalesBuild;
use App\Http\Controllers\Controller;
use Atlas\Reports\Citologias\CitologiasAnormalesQuery;
use Illuminate\Http\Request;

class ReporteCitologiasAnormalesController extends Controller
{

    /**
     * ReporteCitologiasAnormalesController constructor.
     */
    function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return View('reportes.citologia.citologiasAnormales.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function results(Request $request)
    {
        $query = new CitologiasAnormalesQuery();
        list($bdate, $edate, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $totales) = $query->queryBuilder($request);

        return View('reportes.citologia.citologiasAnormales.results',
            compact('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'totales', 'bdate', 'edate'));
    }
}