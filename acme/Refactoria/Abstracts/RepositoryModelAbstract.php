<?php

namespace Acme\Abstracts;
use Illuminate\Database\Eloquent\Model;

abstract class RepositoryModelAbstract
{

    protected $model;
    function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }
}