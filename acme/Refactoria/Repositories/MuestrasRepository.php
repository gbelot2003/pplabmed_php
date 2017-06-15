<?php

namespace Acme\Refactoria\Repositories;

use Acme\Refactoria\Implement\FormatSimpleDates;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use App\Histopatologia;
use Illuminate\Http\Request;

class MuestrasRepository implements QueryModelsInterfaces
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->histo = new Histopatologia();
        $this->request = $request;
        $this->dateQuery = new FormatSimpleDates();
    }

    /**
     * @return mixed
     */
    public function instancesRequires()
    {
        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);
        $query = $this->histo->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate])->orderBy('created_at', 'asc');

        $pdf = $this->request->has('pdf') ? $this->request->get('pdf') : null;

        return array($bdate, $edate, $pdf, $query);
    }
}