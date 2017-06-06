<?php

namespace Acme\Refactoria\Builds;


use Acme\Refactoria\Implement\QueryBuilderForms;
use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Acme\Refactoria\Repositories\MuestrasRepository;
use Illuminate\Http\Request;

class ReporteMuestraBuild implements QueryConcreatInterface
{
    public function builCallController(Request $request)
    {
        $repo = new MuestrasRepository($request);
        $query = new QueryBuilderForms($request, $repo);
        list($bdate, $edate, $pdf, $items) = $query->buildSpetialQuerys();
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