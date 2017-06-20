<?php

namespace Atlas\Reports;

use Atlas\Helpers\DatesFormatHelper;
use Atlas\Helpers\FormatQueryDates;
use Illuminate\Http\Request;

class QueryBuilder
{

    protected $request;

    function __construct()
    {
        $this->formatQuery = new FormatQueryDates();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function processRequirements(Request $request)
    {
        if($request->has('inicio'))
        {
            $date = new DatesFormatHelper($request->get('inicio'));
            $b_date = $date->setDate();
        }

        if($request->has('final'))
        {
            $date = new DatesFormatHelper($request->get('final'));
            $e_date = $date->setDate();
        }


        if(isset($b_date) && isset($e_date)){
            list($bdate, $edate) = $this->formatQuery->formatQueryDates($b_date, $e_date);
        }

        $idCito = $request->has('icitologia_id') ? $request->get('icitologia_id') : null;
        $direc = $request->has('direccion') ? $request->get('direccion') : null;
        $mor1 = $request->has('mor1') ? $request->get('mor1') : null;
        $mor2 = $request->has('mor2') ? $request->get('mor2') : null;
        $topog = $request->has('topog') ? $request->get('topog') : null;

        return array($bdate, $edate, $idCito, $direc, $mor1, $mor2, $topog);
    }


}