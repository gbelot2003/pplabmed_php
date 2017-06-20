<?php

namespace Atlas\Reports\Sedes;

use App\Factura;
use Atlas\Reports\QueryBuilder;
use Illuminate\Http\Request;

class HojaTrabajoCedesQuery
{
    function __construct()
    {
        $this->model = new Factura();
    }

    public function queryBuilder(Request $request)
    {
        $query = new QueryBuilder();
        list($bdate, $edate, $idCito, $direc, $mor1, $mor2, $topog) = $query->processRequirements($request);

        $query = $this->model->select('facturas.num_factura', 'facturas.nombre_completo_cliente', 'facturas.edad',
            'facturas.medico', 'facturas.sexo', 'x.nombre_examen', 'facturas.direccion_entrega_sede');
        $query->join('examenes as x', 'x.num_factura', '=', 'facturas.num_factura')
        ->whereBetween('facturas.created_at', [$bdate, $edate])
        ->where('status', 'Valida');
        if (isset($direc)){
            $query->where('direccion_entrega_sede', 'LIKE', '%' . $direc. '%');
        }
        $query->groupBy('facturas.num_factura');
        $query->orderBy('facturas.num_factura', 'ASC');


        $data = $query->get();
        $total = $data->count();

        return array($data, $bdate, $edate, $total, $direc);
    }
}