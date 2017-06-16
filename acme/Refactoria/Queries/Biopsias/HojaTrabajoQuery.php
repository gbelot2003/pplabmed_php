<?php

namespace Acme\Refactoria\Queries\Biopsias;

use Acme\Abstracts\QueryBuilderAbstract;
use Acme\Intefaces\QueryPostInterface;
use Acme\Refactoria\Implement\FormatSimpleDates;
use Illuminate\Http\Request;

class HojaTrabajoQuery extends QueryBuilderAbstract implements QueryPostInterface
{

    protected $model;
    protected $request;
    function __construct()
    {
        $this->dateQuery = new FormatSimpleDates();
    }

    /**
     * Funcion de ejecucion de Querys
     * @return mixed
     */
    protected function constructQuery()
    {
        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);

        $query = $this->model->whereBetween('facturas.fecha_informe', [$bdate, $edate]);

        $list_id = $this->filteringList();

        $query = $this->model->select('facturas.num_factura', 'facturas.nombre_completo_cliente', 'facturas.edad', 'facturas.sexo', 'facturas.medico',
            'examenes.nombre_examen', 'facturas.direccion_entrega_sede', 'histopatologias.serial', 'facturas.created_at')
            ->Join('examenes', 'examenes.num_factura', '=', 'facturas.num_factura')
            ->leftJoin('histopatologias', 'facturas.num_factura', '=', 'histopatologias.factura_id')
            ->whereBetween('facturas.created_at', [$bdate, $edate])
            ->whereIn('examenes.item', $list_id)
            ->where('facturas.status', 'Valida')
            ->orderBy('facturas.num_factura', 'ASC');

        if ($this->request->has('direccion')) {
            $direc = $this->request->get('direccion');
            $query->where('facturas.direccion_entrega_sede', 'LIKE', '%' . $direc . '%');
        }

       $data = $query->get();

        return array($bdate, $edate, $data);
    }

    /**
     * @return mixed
     */
    public function output()
    {
        return $this->constructQuery();
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

    /**
     * @return array
     */
    protected function filteringList()
    {
        return  [10245, 10246, 10247, 10248, 10249, 10250, 10251, 10252, 10253, 10254, 10255, 10256, 10257, 10258,
            10259, 10260, 10261, 10262, 10263, 10264, 10265, 10266, 10267, 10268, 10269, 10270, 10271, 10272, 10273,
            10274, 10275, 10276, 10277, 10278, 10279, 10280, 10281, 10282, 10283, 10284, 10285, 10286, 10287, 10288,
            10289, 10290, 10291, 10292, 10293, 10294, 10295, 10296, 10297, 10298, 10299, 10300, 10301, 10302, 10303,
            10304, 10305, 10306, 10307, 10308, 10310, 10311, 10312, 10313, 10314, 10315, 10316, 10317, 10318, 10319,
            10320, 10321, 10322, 10323, 10324, 10325, 10329, 10330, 10331, 11413, 11445, 11447, 11448, 11449, 11450,
            11451, 11452, 11453, 11454, 11455, 11456, 11457, 11458, 11459, 11460, 11462, 11470, 11471, 11472];
    }
}