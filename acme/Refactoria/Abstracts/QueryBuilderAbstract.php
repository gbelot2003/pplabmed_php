<?php

namespace Acme\Abstracts;

/**
 * Class QueryBuilderAbstract
 * @package Acme\Abstracts
 *
 * Clase base para las querys
 */
abstract class QueryBuilderAbstract {


    function __construct()
    {
    }

    /**
     * Funcion de ejecucion de Querys
     * @return mixed
     */
    abstract protected function constructQuery();

}