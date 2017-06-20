<?php
namespace App\Http\Controllers\Reportes;


use Acme\Refactoria\Builds\IdentifadorBuild;
use App\Categoria;
use App\Factura;
use App\Http\Controllers\Controller;
use Atlas\Reports\Citologias\IdentificadorCitologiaQuery;
use Illuminate\Http\Request;


class ReportesIdentificadorCitologiaController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowReports');
        $this->categoria = new Categoria();
        $this->factura = new Factura();

    }

    public function index()
    {
        $idCito = $this->categoria->where('status', 1)->pluck('name', 'id');
        $direc = $this->factura->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return View('reportes.citologia.IdentificadorCitologias.index', compact('idCito', 'direc'));
    }

    public function results(Request $request)
    {
        $query = new IdentificadorCitologiaQuery();
        list($items, $bdate, $edate, $total) = $query->queryBuilder($request);

        return View('reportes.citologia.IdentificadorCitologias.results', compact('items','bdate', 'edate', 'total'));
    }
}