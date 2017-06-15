<?php

namespace Acme\Refactoria\Repos;

use Acme\Abstracts\RepositoryModelAbstract;
use Acme\Intefaces\QueryPostInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HistoPatologiaRepo extends RepositoryModelAbstract
{
    protected $model;
    function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function requireParams(Request $request, QueryPostInterface $query)
    {
        $query->getParams($request, $this->model);
        return $query->output();
    }
}