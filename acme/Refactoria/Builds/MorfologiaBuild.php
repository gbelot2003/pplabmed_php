<?php

namespace Acme\Refactoria\Builds;

use Acme\Refactoria\Implement\QueryBuilderForms;
use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Acme\Refactoria\Repositories\MorfologicRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MorfologiaBuild implements QueryConcreatInterface
{

    public function builCallController(Request $request)
    {
        $repo = new MorfologicRepository($request);
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
        if ($pdf == null) {
            return View('reportes.histo.morfologias.results', compact('items', 'bdate', 'edate'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.histo.morfologias.results-pdf', compact('items', 'bdate', 'edate'));
            return $pdf->stream();
        }
    }
}