<?php

namespace Atlas\Reports\Patologia;

use App\Histopatologia;
use Atlas\Reports\QueryBuilder;
use Illuminate\Http\Request;

class ReporteMorfologicoQuery {

    function __construct()
    {
        $this->model = new Histopatologia();
    }

    public function queryBuilder(Request $request)
    {
        $query = new QueryBuilder();
        list($bdate, $edate, $idCito, $direc, $mor1, $mor2, $topog) = $query->processRequirements($request);

        $query = $this->model->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);


        if(isset($mor1)){
            $query->where('mor1', $mor1);
        }

        if(isset($mor2)){
            $query->where('mor2', $mor2);
        }

        if(isset($topog)){
            $query->where('topog', $topog);
        }

        $items = $query->get();

        return array($items, $bdate, $edate);
    }
}