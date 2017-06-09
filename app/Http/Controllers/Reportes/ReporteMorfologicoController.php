<?php

namespace App\Http\Controllers\Reportes;

use Acme\Refactoria\Builds\MorfologiaBuild;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporteMorfologicoController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->build = new MorfologiaBuild();
    }


    public function index()
    {
        return View('reportes.histo.morfologias.index');
    }

    public function results(Request $request)
    {
        return $this->build->builCallController($request);
    }
}