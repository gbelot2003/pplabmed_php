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
            ->where('muestra_entrega', 1)
            ->orderBy('factura_id', 'asc');

        $item = $data->get();
        $total = $item->count();

        return array($item, $bdate, $edate, $total);
    }

}