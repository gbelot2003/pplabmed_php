<?php

namespace Acme\Refactoria\Interfaces;


use Illuminate\Http\Request;

interface QueryBuilderSpetialInterface
{
    /**
     * QueryBuilderSpetialInterface constructor.
     * @param Request $request
     * @param QueryModelsInterfaces $repo
     */
    public function __construct(Request $request, QueryModelsInterfaces $repo);

    /**
     * @return mixed
     */
    public function buildSpetialQuerys();

}