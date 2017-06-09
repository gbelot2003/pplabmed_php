<?php

namespace Acme\Refactoria\Builds;

use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Acme\Refactoria\Repositories\IdentificadorRepository;
use Acme\Refactoria\Implement\QueryRequireConcreatInterface;
use Acme\Refactoria\Implement\QueryBuilderSpetial;
use App\Categoria;
use App\Factura;
use Illuminate\Http\Request;

class IdentifadorBuild implements QueryConcreatInterface, QueryRequireConcreatInterface
{

    public function __construct()
    {
        $this->categoria = new Categoria();
        $this->factura = new Factura();
    }

    /**
     * @return array
     */
    public function builRequiresController()
    {
        $idCito = $this->categoria->where('status', 1)->pluck('name', 'id');
        $direc = $this->factura->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return array($idCito, $direc);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function builCallController(Request $request)
    {
        $repo = new IdentificadorRepository($request);
        $query = new QueryBuilderSpetial($request, $repo);
        list($bdate, $edate, $pdf, $items) = $query->buidQuery();
        $total = $query->buildTotalQuery();

        $direccion = $request->has('direccion') ? $request->get('direccion') : null;
        return $this->resultsReturn($bdate, $edate, $pdf, $items, $direccion, $total);
    }

    /**
     * @param $bdate
     * @param $edate
     * @param $pdf
     * @param $items
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function resultsReturn($bdate, $edate, $pdf, $items, $direccion, $total)
    {
        if (!isset($pdf)) {
            return View('reportes.citologia.IdentificadorCitologias.results', compact('items','bdate', 'edate', 'total'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.citologia.IdentificadorCitologias.results-pdf', compact('items', 'bdate', 'edate', 'total'));
            return $pdf->stream();
        }
    }
}