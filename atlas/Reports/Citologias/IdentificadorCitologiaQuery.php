<?php

namespace Atlas\Reports\Citologias;

use App\Citologia;
use App\Factura;
use Atlas\Reports\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdentificadorCitologiaQuery
{

    function __construct()
    {
        $this->citologia = new Citologia();
    }

    public function queryBuilder(Request $request)
    {

        $build = new QueryBuilder();
        list($bdate, $edate, $idCito, $direc, $mor1, $mor2, $topog) = $build->processRequirements($request);

        $query = $this->citologia->whereBetween('fecha_informe', [$bdate, $edate]);

        $query->select(DB::raw('COUNT(icitologia_id) as counter, categorias.name, categorias.id as catId'));
        $query->join('categorias', 'icitologia_id', '=', 'categorias.id');
        $query->groupBy('icitologia_id');
        $query->orderby('categorias.id', 'ASC');

        $items = $query->get();
        $cito = $this->citologia->whereBetween('fecha_informe', [$bdate, $edate])->get();
        $total = $cito->count();

        return array($items, $bdate, $edate, $total);
    }
}