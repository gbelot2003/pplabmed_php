<?php
/**
 * Created by PhpStorm.
 * User: gbelot
 * Date: 06-19-17
 * Time: 02:55 PM
 */

namespace Atlas\Reports;


abstract class QueryFactory
{

    function __construct()
    {
    }

    /**
     * @param Model $model
     * @param Request $request
     * @return array
     */
    public function processRequirements(Model $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
}