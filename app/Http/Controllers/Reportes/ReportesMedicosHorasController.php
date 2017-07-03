<?php

namespace App\Http\Controllers\Reportes;


use App\Firma;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ReportesMedicosHorasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
    }

    public function index()
    {
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('reportes.medicos.index', compact('firmas'));
    }
}