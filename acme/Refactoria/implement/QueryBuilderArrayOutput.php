<?php

namespace Acme\Refactoria\Implement;


use Acme\Refactoria\Interfaces\QueryBuilderSpetialInterface;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use Illuminate\Http\Request;

class QueryBuilderArrayOutput implements QueryBuilderSpetialInterface
{

    protected $request;
    protected $repo;

    /**
     * QueryBuilderSpetialInterface constructor.
     * @param Request $request
     * @param QueryModelsInterfaces $repo
     */
    public function __construct(Request $request, QueryModelsInterfaces $repo)
    {
        $this->request = $request;
        $this->repo = new $repo($this->request);
    }

    /**
     * @return mixed
     */
    public function buildSpetialQuerys()
    {
        return list($bdate, $edate, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $totales) = $this->repo->instancesRequires();
    }
}