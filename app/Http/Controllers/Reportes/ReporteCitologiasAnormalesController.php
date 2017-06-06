<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\CitologiasAnormalesBuild;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporteCitologiasAnormalesController extends Controller
{

    /**
     * ReporteCitologiasAnormalesController constructor.
     */
    function __construct()
    {
        $this->build = new CitologiasAnormalesBuild();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return View('reportes.citologia.IdentificadorCitologias.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function results(Request $request)
    {
        return $this->build->builCallController($request);
    }
}