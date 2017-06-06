<?php

namespace Acme\Refactoria\Builds;

use Acme\Refactoria\Implement\QueryBuilderArrayOutput;
use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Acme\Refactoria\Repositories\CitologiasAnormalesRepository;
use Illuminate\Http\Request;

class CitologiasAnormalesBuild implements QueryConcreatInterface
{

    public function builCallController(Request $request)
    {
        $repo = new CitologiasAnormalesRepository($request);
        $query = new QueryBuilderArrayOutput($request, $repo);
        $pdf = $request->has('pdf') ? $request->get('pdf'): null;

        list($bdate, $edate, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $totales) = $query->buildSpetialQuerys();

        return $this->resultsReturn($bdate, $edate, $pdf, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $totales);
    }

    /**
     * @param $bdate
     * @param $edate
     * @param $pdf
     * @param $a
     * @param $b
     * @param $c
     * @param $d
     * @param $e
     * @param $f
     * @param $g
     * @param $h
     * @param $i
     * @param $j
     * @param $k
     * @param $totales
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $items
     */
    protected function resultsReturn($bdate, $edate, $pdf, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $totales)
    {
        if (!isset($pdf)) {
            return View('reportes.citologia.citologiasAnormales.results',
                compact('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'totales', 'bdate', 'edate'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.citologia.citologiasAnormales.results-pdf',
                compact('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'totales', 'bdate', 'edate'));
            return $pdf->stream();
        }
    }
}