<?php

namespace Acme\Intefaces;

interface QueryGetInterface {

    /**
     * @return mixed
     */
    public function output();

    /**
     * @param array $params
     * @return mixed
     */
    public function getParams(array $params, $model);

}