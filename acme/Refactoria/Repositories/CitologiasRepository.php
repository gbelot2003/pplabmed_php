<?php

namespace Acme\Refactoria\Repositories;

use Acme\Refactoria\Implement\FormatSimpleDates;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;

use App\Citologia;
use Illuminate\Http\Request;

class CitologiasRepository implements QueryModelsInterfaces
{

    protected $citologia;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->citologia = new Citologia();
        $this->dateQuery = new FormatSimpleDates();
    }

    /**
     * @return array
     */
    public function instancesRequires()
    {
        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);
        $query = $this->citologia->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);

        $pdf = $this->request->has('pdf') ? $this->request->get('pdf') : null;

        if ($this->request->has('icitologia_id')) {
            $query->where('icitologia_id', $this->request->get('icitologia_id'));
        }

        if ($this->request->has('direccion')) {
            $direc = $this->request->get('direccion');
            $query->whereHas('facturas', function ($q) use ($direc) {
                $q->where('direccion_entrega_sede', 'like', '%' . $direc . '%');
            });
        }


        return array($bdate, $edate, $pdf, $query);
    }
}