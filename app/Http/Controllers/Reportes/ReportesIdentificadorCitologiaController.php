<?php
namespace App\Http\Controllers\Reportes;


use App\Http\Controllers\Controller;

class ReportesIdentificadorCitologiaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
    }

    public function index()
    {
        return View('reportes.citologia.identificadorForm', compact('idCito', 'direc'));
    }

    public function results()
    {

    }
}