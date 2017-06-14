<?php

namespace Acme\Refactoria\Queries\Citologias;

use Acme\Abstracts\QueryBuilderAbstract;
use Acme\Intefaces\QueryPostInterface;
use Acme\Refactoria\Implement\FormatSimpleDates;
use Illuminate\Http\Request;

class HojaTrabajoQuery extends QueryBuilderAbstract implements QueryPostInterface
{

    protected $model;
    protected $request;
    function __construct()
    {
        $this->dateQuery = new FormatSimpleDates();
    }

    /**
     * @return mixed
     */
    public function output()
    {
        return $this->constructQuery();
    }

    /**
     * Funcion de ejecucion de Querys
     * @return mixed
     */
    protected function constructQuery()
    {

        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);
        $query = $this->model->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);


        if ($this->request->has('icitologia_id')) {
            $query->where('icitologia_id', $this->request->get('icitologia_id'));
        }

        if ($this->request->has('direccion')) {
            $direc = $this->request->get('direccion');
            $query->whereHas('facturas', function ($q) use ($direc) {
                $q->where('direccion_entrega_sede', 'like', '%' . $direc . '%');
            });
        }

        $results = $query->get();

        return array($bdate, $edate, $results);
    }


    /**
     * @param Request $request
     * @param $model
     * @return mixed
     * @internal param $Request $
     */
    public function getParams(Request $request, $model)
    {
        $this->model = $model;
        $this->request = $request;
        return array($this->request, $this->model);
    }
}