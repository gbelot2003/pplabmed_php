<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\ReporteMuestraBuild;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporteMuestrasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->build = new ReporteMuestraBuild();
    }

    public function index()
    {
        return View('reportes.histo.reporteMuestra.index');
    }

    public function results(Request $request)
    {
        return $this->build->builCallController($request);
    }

}