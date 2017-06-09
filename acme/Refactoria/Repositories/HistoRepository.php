<?php

namespace Acme\Refactoria\Repositories;

use Acme\Refactoria\Implement\FormatSimpleDates;
use Acme\Refactoria\Interfaces\QueryModelsInterfaces;
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
        $this->histo = new Histopatologia();
    }

    /**
     * @return mixed
     */
    public function instancesRequires()
    {
        list($bdate, $edate) = $this->dateQuery->formatQueryDates($this->request);
        $query = $this->histo->with('facturas')->whereBetween('fecha_informe', [$bdate, $edate]);

        $pdf = $this->request->has('pdf') ? $this->request->get('pdf') : null;

        if ($this->request->has('direccion')) {
            $direc = $this->request->get('direccion');
            $query->whereHas('facturas', function ($q) use ($direc) {
                $q->where('direccion_entrega_sede', 'like', '%' . $direc . '%');
            });
        }

        return array($bdate, $edate, $pdf, $query);
    }
}