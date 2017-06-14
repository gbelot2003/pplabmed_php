<?php

namespace Acme\Refactoria\Builds;

use Acme\Refactoria\Implement\QueryBuilderForms;
use Acme\Refactoria\Implement\QueryRequireConcreatInterface;
use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Acme\Refactoria\Repositories\HistoRepository;
use App\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HistoBuild implements QueryConcreatInterface, QueryRequireConcreatInterface
{

    public function __construct()
    {
        $this->factura = new Factura();
    }

    public function builRequiresController()
    {
        return $this->factura->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
    }

    public function builCallController(Request $request)
    {
        $repo = new HistoRepository($request);
        $query = new QueryBuilderForms($request, $repo);
        list($bdate, $edate, $pdf, $items) = $query->buidQuery();

        return $this->resultsReturn($bdate, $edate, $pdf, $items);
    }

    /**
     * @param $bdate
     * @param $edate
     * @param $pdf
     * @param $items
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function resultsReturn($bdate, $edate, $pdf, $items)
    {
        if (!isset($pdf)) {
            return View('reportes.histo.hojaTrabajo.result', compact('items', 'bdate', 'edate', 'direc'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.histo.hojaTrabajo.result-pdf', compact('items', 'bdate', 'edate', 'direc'));
            return $pdf->stream();
        }
    }
}