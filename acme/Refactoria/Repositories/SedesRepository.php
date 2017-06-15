<?php

namespace Acme\Refactoria\Repositories;


use Acme\Refactoria\Implement\FormatSimpleDates;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SedesRepository implements QueryModelsInterfaces
{

    protected $request;

    /**
     * SedesRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->dateQuery = new FormatSimpleDates();
    }

    /**
     * @return mixed
     */
    public function instancesRequires()
    {
        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);

        $query = $this->doQuery($bdate, $edate);

        $pdf = $this->request->has('pdf') ? $this->request->get('pdf') : null;

        return array($bdate, $edate, $pdf, $query);
    }

    /**
     * @param $bdate
     * @param $edate
     * @return mixed
     */
    protected function doQuery($bdate, $edate)
    {
        $PDO = DB::connection('mysql')->getPdo();
        if ($this->request->has('direccion')) {
            $direc = $this->request->get('direccion');

            $query = $PDO->prepare("
                select DISTINCT f.id, f.num_factura, f.nombre_completo_cliente, f.edad, f.sexo, x.nombre_examen, f.direccion_entrega_sede, c.serial from facturas as f
                left JOIN examenes as x on f.num_factura = x.num_factura
                left JOIN citologias as c on f.num_factura = c.factura_id
                where f.created_at BETWEEN '" . $bdate . "' AND '" . $edate . "'
                AND f.direccion_entrega_sede = '" . $direc . "'
                UNION
                select DISTINCT f.id, f.num_factura, f.nombre_completo_cliente, f.edad, f.sexo, x.nombre_examen, f.direccion_entrega_sede, h.serial from facturas as f
                left JOIN histopatologias as h on f.num_factura = h.factura_id
                left JOIN examenes as x on f.num_factura = x.num_factura
                where f.created_at BETWEEN '" . $bdate . "' AND '" . $edate . "'
                AND f.direccion_entrega_sede = '" . $direc . "'
                GROUP BY num_factura
                ORDER BY id ASC
              ");
        } else {
            $query = $PDO->prepare("
                select DISTINCT f.id, f.num_factura, f.nombre_completo_cliente, f.edad, f.sexo, x.nombre_examen, f.direccion_entrega_sede, c.serial from facturas as f
                left JOIN examenes as x on f.num_factura = x.num_factura
                left JOIN citologias as c on f.num_factura = c.factura_id
                where f.created_at BETWEEN '" . $bdate . "' AND '" . $edate . "'
                UNION
                select DISTINCT f.id, f.num_factura, f.nombre_completo_cliente, f.edad, f.sexo, x.nombre_examen, f.direccion_entrega_sede, h.serial from facturas as f
                left JOIN examenes as x on f.num_factura = x.num_factura
                left JOIN histopatologias as h on f.num_factura = h.factura_id
                where f.created_at BETWEEN '" . $bdate . "' AND '" . $edate . "'
                GROUP BY num_factura
                ORDER BY id ASC
              ");
        }

        return $query;
    }
}