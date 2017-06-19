<?php

namespace Acme\Refactoria\Queries\Citologias;

use Acme\Abstracts\QueryBuilderAbstract;
use Acme\Helpers\DateHelper;
use Acme\Intefaces\QueryPostInterface;
use Acme\Refactoria\Implement\FormatSimpleDates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HojaTrabajoQuery extends QueryBuilderAbstract implements QueryPostInterface
{

    protected $model;
    protected $request;
    function __construct()
    {
        $this->dateQuery = new FormatSimpleDates();
    }

    /**
     * @return mixed
     */
    public function output()
    {
        return $this->constructQuery();
    }

    /**
     * Funcion de ejecucion de Querys
     * @return mixed
     */
    protected function constructQuery()
    {

        if ($this->request->has('inicio')) {
            $fecha_nac = new DateHelper($this->request->get('inicio'));
            $this->request['inicio'] = $fecha_nac->getDate();
        }

        if ($this->request->has('final')) {
            $fecha_nac = new DateHelper($this->request->get('final'));
            $this->request['final'] = $fecha_nac->getDate();
        }

        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);

        $list_id = [10326, 10327, 10328, 10332, 10333, 10334, 10335, 10336];

        $query = $this->model->select('facturas.num_factura', 'facturas.nombre_completo_cliente', 'facturas.edad', 'facturas.sexo', 'facturas.medico',
            'examenes.nombre_examen', 'facturas.direccion_entrega_sede', 'citologias.serial', 'facturas.created_at')
            ->Join('examenes', 'examenes.num_factura', '=', 'facturas.num_factura')
            ->leftJoin('citologias', 'facturas.num_factura', '=', 'citologias.factura_id')
            ->whereBetween('facturas.created_at', [$bdate, $edate])
            ->whereIn('examenes.item', $list_id)
            ->where('facturas.status', 'Valida')
            ->groupBy('facturas.num_factura')
            ->orderBy('facturas.num_factura', 'ASC');

        if ($this->request->has('direccion')) {
            $direc = $this->request->get('direccion');

            $query->where('facturas.direccion_entrega_sede', 'LIKE', '%' . $direc . '%');
        }

        if ($this->request->has('icitologia_id')) {
            $idcito = $this->request->get('icitologia_id');
            $query->whereHas('citologias', function ($q) use ($idcito) {
                $q->where('icitologia_id', $idcito);
            });
        }

        $data = $query->get();

        return array($bdate, $edate,  $data);
    }


    /**
     * @param Request $request
     * @param $model
     * @return mixed
     * @internal param $Request $
     */
    public function getParams(Request $request, $model)
    {
        $this->model = $model;
        $this->request = $request;
        return array($this->request, $this->model);
    }
}