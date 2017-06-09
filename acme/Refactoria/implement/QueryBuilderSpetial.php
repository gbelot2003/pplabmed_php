<?php

namespace Acme\Refactoria\Implement;

use Acme\Refactoria\Interfaces\QueryBuilderInterface;
use Acme\Refactoria\Interfaces\QueryBuildersTotalsInterface;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use Illuminate\Http\Request;


class QueryBuilderSpetial implements QueryBuilderInterface, QueryBuildersTotalsInterface
{

    /**
     * QueryBuilderSpetialInterface constructor.
     * @param Request $request
     * @param QueryModelsInterfaces $repo
     */
    public function __construct(Request $request, QueryModelsInterfaces $repo)
    {
        $this->request = $request;
        $this->repo = new $repo($request);
    }

    /**
     * @return mixed
     */
    public function buidQuery()
    {
        list($bdate, $edate, $pdf, $query) = $this->repo->instancesRequires();
        $items = $query->get();
        return array($bdate, $edate, $pdf, $items);
    }

    /**
     * @return int
     */
    public function buildTotalQuery()
    {
        list($bdate, $edate, $pdf, $query) = $this->repo->instancesRequires();
        $items = $query->get();
        return $items->count();
    }
}