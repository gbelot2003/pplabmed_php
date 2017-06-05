<?php

namespace Acme\Refactoria\Interfaces;


use Illuminate\Http\Request;

interface QueryBuilderInterface
{

    public function __construct(Request $request, QueryModelsInterfaces $repo);

    public function buidQuery();
}