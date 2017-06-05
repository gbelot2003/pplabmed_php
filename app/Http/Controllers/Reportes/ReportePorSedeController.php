<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\ReporteSedeBuild;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportePorSedeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->build = new ReporteSedeBuild();
    }

    public function index()
    {
        $direc = $this->build->builRequiresController();
        return View('reportes.reporteDeparamentos.index', compact( 'direc'));
    }

    public function results(Request $request)
    {
        return $this->build->builCallController($request);
    }
}