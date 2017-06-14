<?php

namespace Acme\Intefaces;

use Illuminate\Http\Request;

interface QueryPostInterface{

    /**
     * @return mixed
     */
    public function output();

    /**
     * @param Request $request
     * @param $model
     * @return mixed
     * @internal param $Request $
     */
    public function getParams(Request $request, $model);

}