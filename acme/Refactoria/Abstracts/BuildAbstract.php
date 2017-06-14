<?php

namespace Acme\Abstracts;

use Illuminate\Http\Request;

abstract class BuildAbstract
{
    protected $request;

    /**
     * BuildAbstract constructor.
     * Este esta opcional por si se necesita la llamada de mas repositorios
     */
    function __construct()
    {
    }

    /**
     * Conecta y Retorna al controlador los resultados de resultReturn
     * @return mixed
     */
    abstract public function buildCall();

    /**
     * Aquí se concreta la query
     * @return mixed
     */
    abstract protected function queryBuilder();

    /**
     * Retorna los resultados y conecta las vistas de ser necesario
     * @return mixed
     */
    abstract protected function resultReturn();

    /**
     * Recoje los valores de Request en caso de necesitarse
     * @param Request $request
     * @return Request
     */
    public function getRequest(Request $request)
    {
        return $request;
    }
}