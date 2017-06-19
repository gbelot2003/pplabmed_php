<?php

namespace Acme\Refactoria\Builds\Biopsias;

use Acme\Abstracts\BuildAbstract;
use Acme\Controller\Printer\Reportes\BiopiasHojaTrabajo;
use Acme\Refactoria\Queries\Biopsias\HojaTrabajoQuery;
use Acme\Refactoria\Repos\HistoPatologiaRepo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HojaTrabajoBuild extends BuildAbstract
{

    protected $request;
    function __construct(Model $model, Request $request)
    {
        $this->repo = new HistoPatologiaRepo($model);
        $this->request = $request;
    }

    /**
     * Aquí se concreta la query
     * @return mixed
     */
    protected function queryBuilder()
    {
        $query = new HojaTrabajoQuery();
        list($bdate, $edate, $repo) = $this->repo->requireParams($this->request, $query);
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

        $print = new BiopiasHojaTrabajo();
        return $print->printPdfHitoReport($items, $bdate, $edate);
    }

    /**
     * Conecta y Retorna al controlador los resultados de resultReturn
     * @return mixed
     */
    public function buildCall()
    {
        return $this->resultReturn();
    }


}
