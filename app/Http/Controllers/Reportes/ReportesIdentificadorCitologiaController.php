<?php
namespace App\Http\Controllers\Reportes;


use Acme\Refactoria\Builds\IdentifadorBuild;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ReportesIdentificadorCitologiaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->build = new IdentifadorBuild();

    }

    public function index()
    {
        list($idCito, $direc) = $this->build->builRequiresController();
        return View('reportes.citologia.IdentificadorCitologias.index', compact('idCito', 'direc'));
    }

    public function results(Request $request)
    {
        return $this->build->builCallController($request);
    }
}