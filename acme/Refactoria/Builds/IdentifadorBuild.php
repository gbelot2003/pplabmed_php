<?php

namespace Acme\Refactoria\Builds;

use Acme\Refactoria\Implement\QueryRequireConcreatInterface;
use Acme\Refactoria\Interfaces\QueryBuildersTotalsInterface;
use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Illuminate\Http\Request;

class IdentifadorBuild implements QueryConcreatInterface, QueryBuildersTotalsInterface, QueryRequireConcreatInterface
{

    public function __construct()
    {
    }

    public function builRequiresController()
    {
        // TODO: Implement builRequiresController() method.
    }

    public function builCallController(Request $request)
    {
        // TODO: Implement builCallController() method.
    }

    /**
     * @return int
     */
    public function buildTotalQuery()
    {
        // TODO: Implement buildTotalQuery() method.
    }
}