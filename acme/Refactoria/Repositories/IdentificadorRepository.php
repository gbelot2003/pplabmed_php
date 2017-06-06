<?php

namespace Acme\Refactoria\Repositories;

use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use Illuminate\Http\Request;

class IdentificadorRepository implements QueryModelsInterfaces
{

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->citologia = new Citologia();
        $this->dateQuery = new FormatSimpleDates();
    }

    /**
     * @return mixed
     */
    public function instancesRequires()
    {
        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);

        $pdf = $this->request->has('pdf') ? $this->request->get('pdf') : null;

        $query = $this->citologia->whereBetween('fecha_informe', [$bdate, $edate]);

        $query->select(DB::raw('COUNT(icitologia_id) as counter, categorias.name, categorias.id as catId'));
        $query->join('categorias', 'icitologia_id', '=', 'categorias.id');
        $query->groupBy('icitologia_id');
        $query->orderby('categorias.id', 'ASC');

        return array($bdate, $edate, $pdf, $query);
    }
}