<?php

namespace Acme\Refactoria\Implement;

use Acme\Refactoria\Interfaces\QueryBuilderInterface;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use Illuminate\Http\Request;

class QueryBuilderForms implements QueryBuilderInterface{

    protected $request;
    protected $repo;

    public function __construct(Request $request, QueryModelsInterfaces $repo)
    {
        $this->request = $request;
        $this->repo = new $repo($request);
    }

    public function buidQuery()
    {
        /**
         * Retorna fechas y query con tabla relacionada
         * Funcion de busqueda concreta
         */

        list($bdate, $edate, $pdf, $query) = $this->repo->instancesRequires();
        $items = $query->get();
        return array($bdate, $edate, $pdf, $items);
    }

    public function buildSpetialQuerys()
    {
        list($bdate, $edate, $pdf, $query) = $this->repo->instancesRequires();
        $query->execute();
        $items = $query->fetchAll((\PDO::FETCH_ASSOC));
        return array($bdate, $edate, $pdf, $items);
    }

    /**
     * @return int
     */
    public function buildTotalQuery()
    {
        list($bdate, $edate, $pdf, $query) = $this->repo->instancesRequires();
        $query->execute();
        return $query->rowCount();
    }
}

