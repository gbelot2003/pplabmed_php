<?php

namespace Acme\Refactoria\Repositories;

use Acme\Refactoria\Implement\FormatSimpleDates;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use App\Factura;
use App\Histopatologia;
use Illuminate\Http\Request;

class HistoRepository implements QueryModelsInterfaces
{

    protected $histo;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->dateQuery = new FormatSimpleDates();
        $this->histo = new Factura();
    }

    /**
     * @return mixed
     */
    public function instancesRequires()
    {
        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);

        $pdf = $this->request->has('pdf') ? $this->request->get('pdf') : null;

        $query = $this->histo->whereBetween('facturas.fecha_informe', [$bdate, $edate]);

        $query = $this->histo->select('facturas.num_factura', 'facturas.nombre_completo_cliente', 'facturas.edad', 'facturas.sexo', 'facturas.medico',
            'examenes.nombre_examen', 'facturas.direccion_entrega_sede', 'histopatologias.serial', 'histopatologias.created_at')
            ->Join('examenes', 'examenes.num_factura', '=', 'facturas.num_factura')
            ->leftJoin('histopatologias', 'facturas.num_factura', '=', 'histopatologias.factura_id')
            ->whereBetween('facturas.created_at', [$bdate, $edate]);

        if ($this->request->has('direccion')) {
            $direc = $this->request->get('direccion');

            $query->where('facturas.direccion_entrega_sede', 'LIKE', '%' . $direc . '%');
        }


        return array($bdate, $edate, $pdf, $direc, $query);
    }
}