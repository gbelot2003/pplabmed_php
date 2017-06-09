<?php

namespace Acme\Refactoria\Repositories;

use Acme\Refactoria\Implement\FormatSimpleDates;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
use App\Histopatologia;
use Illuminate\Http\Request;

class MorfologicRepository implements QueryModelsInterfaces
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
        $query = $this->histo->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);

        $mor1 = $this->request->has('mor1') ? $this->request->get('mor1') : null;
        $mor2 = $this->request->has('mor2') ? $this->request->get('mor2') : null;
        $topo = $this->request->get('topog') ? $this->request->get('topog') : null;

        if($mor1 != null){
            $query->where('mor1', $mor1);
        }

        if($mor2 != null){
            $query->where('mor2', $mor2);
        }

        if($topo != null){
            $query->where('topo', $topo);
        }

        return $query;
    }
}