<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\HistoBuild;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporteBiopciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->build = new HistoBuild();
    }

    public function index()
    {
        return View('reportes.histo.hojaTrabajo.index', ['direc' => $this->build->builRequiresController()]);
    }

    public function results(Request $request)
    {
        return $this->build->builCallController($request);
    }
}