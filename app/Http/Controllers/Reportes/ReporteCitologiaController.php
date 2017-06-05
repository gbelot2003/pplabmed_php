<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\CitologiaBuild;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ReporteCitologiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->build = new CitologiaBuild();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        list($idCito, $direc) = $this->build->builRequiresController();
        return View('reportes.citologia.hojaTrabajo.index', compact('idCito', 'direc'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function results(Request $request)
    {
        return $this->build->builCallController($request);
    }
}

