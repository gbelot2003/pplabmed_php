<?php

namespace Acme\Refactoria\Interfaces;


use Illuminate\Http\Request;

interface QueryBuilderInterface
{

    /**
     * QueryBuilderInterface constructor.
     * @param Request $request
     * @param QueryModelsInterfaces $repo
     */
    public function __construct(Request $request, QueryModelsInterfaces $repo);

    /**
     * @return mixed
     */
    public function buidQuery();
}