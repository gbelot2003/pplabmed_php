<?php

namespace Atlas\Reports\Citologias;

use App\Factura;
use Atlas\Reports\QueryBuilder;
use Illuminate\Http\Request;

class HojasTrabajoCitologiaQuery
{
    function __construct()
    {
        $this->model = new Factura();
    }

    public function queryBuilder(Request $request)
    {
        $query = new QueryBuilder();
        list($bdate, $edate, $idCito, $direc, $mor1, $mor2, $topog) = $query->processRequirements($request);

        $list_id = [10326, 10327, 10328, 10332, 10333, 10334, 10335, 10336];

        $query = $this->model->select('facturas.num_factura', 'facturas.nombre_completo_cliente', 'facturas.edad', 'facturas.sexo', 'facturas.medico',
            'examenes.nombre_examen', 'facturas.direccion_entrega_sede', 'citologias.serial', 'facturas.created_at')
            ->Join('examenes', 'examenes.num_factura', '=', 'facturas.num_factura')
            ->leftJoin('citologias', 'facturas.num_factura', '=', 'citologias.factura_id')
            ->whereBetween('facturas.created_at', [$bdate, $edate])
            ->whereIn('examenes.item', $list_id)
            ->where('facturas.status', 'Valida')
            ->orderBy('facturas.num_factura', 'ASC');

        if (isset($direc)) {
            $query->where('facturas.direccion_entrega_sede', 'LIKE', '%' . $direc . '%');
        }

        if (isset($idCito)) {
            $query->whereHas('citologias', function ($q) use ($idCito) {
                $q->where('icitologia_id', $idCito);
            });
        }

        $data = $query->get();
        $total = $data->count();

        return array($data, $bdate, $edate, $total);
    }


}