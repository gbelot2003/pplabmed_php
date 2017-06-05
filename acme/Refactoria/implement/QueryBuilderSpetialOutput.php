<?php

namespace Acme\Refactoria\Implement;

use Acme\Refactoria\Interfaces\QueryBuilderSpetialInterface;
use Acme\Refactoria\Interfaces\QueryBuildersTotalsInterface;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use Illuminate\Http\Request;


class QueryBuilderSpetialOutput implements QueryBuilderSpetialInterface, QueryBuildersTotalsInterface
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