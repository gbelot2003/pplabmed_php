<?php

namespace Atlas\Reports\Sedes;

use Atlas\Reports\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HojaTrabajoCedesQuery
{

    public function queryBuilder(Request $request)
    {
        $query = new QueryBuilder();
        list($bdate, $edate, $idCito, $direc, $mor1, $mor2, $topog) = $query->processRequirements($request);

        $PDO = DB::connection('mysql')->getPdo();
        if (isset($direc)) {

            $query = $PDO->prepare("
                select DISTINCT f.id, f.num_factura, f.nombre_completo_cliente, f.edad, f.sexo, f.medico,
                x.nombre_examen, f.direccion_entrega_sede, c.serial from facturas as f
                left JOIN examenes as x on f.num_factura = x.num_factura
                left JOIN citologias as c on f.num_factura = c.factura_id
                where f.created_at BETWEEN '" . $bdate . "' AND '" . $edate . "'
                AND f.direccion_entrega_sede = '" . $direc . "'
                UNION
                select DISTINCT f.id, f.num_factura, f.nombre_completo_cliente, f.edad, f.sexo, f.medico,
                x.nombre_examen, f.direccion_entrega_sede, h.serial from facturas as f
                left JOIN histopatologias as h on f.num_factura = h.factura_id
                left JOIN examenes as x on f.num_factura = x.num_factura
                where f.created_at BETWEEN '" . $bdate . "' AND '" . $edate . "'
                AND f.direccion_entrega_sede = '" . $direc . "'
                GROUP BY num_factura
                ORDER BY num_factura ASC
              ");
        } else {
            $query = $PDO->prepare("
                select DISTINCT f.id, f.num_factura, f.nombre_completo_cliente, f.edad, f.sexo, f.medico,
                x.nombre_examen, f.direccion_entrega_sede, c.serial from facturas as f
                left JOIN examenes as x on f.num_factura = x.num_factura
                left JOIN citologias as c on f.num_factura = c.factura_id
                where f.created_at BETWEEN '" . $bdate . "' AND '" . $edate . "'
                UNION
                select DISTINCT f.id, f.num_factura, f.nombre_completo_cliente, f.edad, f.sexo, f.medico,
                x.nombre_examen, f.direccion_entrega_sede, h.serial from facturas as f
                left JOIN examenes as x on f.num_factura = x.num_factura
                left JOIN histopatologias as h on f.num_factura = h.factura_id
                where f.created_at BETWEEN '" . $bdate . "' AND '" . $edate . "'
                GROUP BY num_factura
                ORDER BY num_factura ASC
              ");
        }

        $query->execute();
        $data = $query->fetchAll((\PDO::FETCH_ASSOC));
        $total = $query->rowCount();

        return array($data, $bdate, $edate, $total, $direc);
    }
}