<?php

namespace Acme\Refactoria\Builds;

use Acme\Refactoria\Implement\QueryBuilderSpetialOutput;
use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Acme\Refactoria\Repositories\SedesRepository;
use App\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class ReporteSedeBuild implements QueryConcreatInterface
{

    public function __construct()
    {
        $this->factura = new Factura();
    }

    /**
     * @return mixed
     */
    public function builRequiresController()
    {
        return $this->factura->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function builCallController(Request $request)
    {
        $repo = new SedesRepository($request);
        $query = new QueryBuilderSpetialOutput($request, $repo);
        list($bdate, $edate, $pdf, $items) = $query->buildSpetialQuerys();

        $total = $query->buildTotalQuery();

        $direccion = $request->has('direccion') ? $request->get('direccion') : null;
        return $this->resultsReturn($bdate, $edate, $pdf, $items, $total, $direccion);
    }

    /**
     * @param $bdate
     * @param $edate
     * @param $pdf
     * @param $items
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function resultsReturn($bdate, $edate, $pdf, $items, $total, $direccion)
    {
        if (!isset($pdf)) {
            return View('reportes.reporteDeparamentos.results', compact('items', 'total', 'bdate', 'edate', 'direccion'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.reporteDepartamentos.results-pdf', compact('items', 'total', 'bdate', 'edate', 'direccion'));
            return $pdf->stream();
        }
    }

}