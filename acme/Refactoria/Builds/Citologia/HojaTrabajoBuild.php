<?php

namespace Acme\Refactoria\Builds\Citologia;

use Acme\Abstracts\BuildAbstract;
use Acme\Controller\Printer\Reportes\CitologiaHojaTrabajo;
use Acme\Refactoria\Queries\Citologias\HojaTrabajoQuery;
use Acme\Refactoria\Repos\CitologíaRepo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HojaTrabajoBuild extends BuildAbstract
{

    protected $request;
    function __construct(Model $model, Request $request)
    {
        $this->repo = new CitologíaRepo($model);
        $this->request = $request;
    }

    /**
     * Conecta y Retorna al controlador los resultados de resultReturn
     * @return mixed
     */
    public function buildCall()
    {
        return $this->resultReturn();
    }

    /**
     * Aquí se concreta la query
     * @return mixed
     */
    protected function queryBuilder()
    {
        $query = new HojaTrabajoQuery();
        list($bdate, $edate, $repo) = $this->repo->hojaTrabajoCitologia($this->request, $query);
        $pdf = $this->request->has('pdf') ? $this->request->get('pdf') : null;

        return array($bdate, $edate, $pdf, $repo);
    }

    /**
     * Retorna los resultados y conecta las vistas de ser necesario
     * @return mixed
     */
    protected function resultReturn()
    {
        list($bdate, $edate, $pdf, $items) = $this->queryBuilder();

        $print = new CitologiaHojaTrabajo();
        return $print->printPdfHitoReport($items, $bdate, $edate);

       /* if (!isset($pdf)) {
            return View('reportes.citologia.hojaTrabajo.results', compact('items', 'bdate', 'edate'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.citologia.hojaTrabajo.results-pdf', compact('items', 'bdate', 'edate'));
            return $pdf->stream();
        }*/
    }
}