<?php

namespace Atlas\Reports\Patologia;

use App\Factura;
use App\Histopatologia;
use Atlas\Reports\QueryBuilder;
use Illuminate\Http\Request;

class HojaMuestrasQuery
{

    function __construct()
    {
        $this->model = new Histopatologia();
    }

    public function queryBuilder(Request $request)
    {
        $query = new QueryBuilder();
        list($bdate, $edate, $idCito, $direc, $mor1, $mor2, $topog) = $query->processRequirements($request);

        $data = $this->model->with('facturas')
            ->whereBetween('fecha_informe', [$bdate, $edate])
            ->orderBy('factura_id', 'asc');


        return array($data, $bdate, $edate);
    }

}