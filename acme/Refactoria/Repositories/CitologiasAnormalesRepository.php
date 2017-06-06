<?php

namespace Acme\Refactoria\Repositories;


use Acme\Refactoria\Implement\FormatSimpleDates;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use Acme\Refactoria\Queries\IdentificadorQuery;
use Illuminate\Http\Request;

class CitologiasAnormalesRepository implements QueryModelsInterfaces
{

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->dateQuery = new FormatSimpleDates();
        $this->identificador = new IdentificadorQuery();
    }

    /**
     * @return mixed
     */
    public function instancesRequires()
    {
        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);
        list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $totales) = $this->identificador->queryTimeRagesResults($bdate, $edate);

        return array($bdate, $edate, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $totales);
    }
}