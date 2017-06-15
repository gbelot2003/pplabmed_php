<?php

namespace Acme\Refactoria\Builds;

use Acme\Controller\Printer\Reportes\CitologiaHojaTrabajo;
use Acme\Refactoria\Implement\QueryBuilderForms;
use Acme\Refactoria\Implement\QueryRequireConcreatInterface;
use Acme\Refactoria\Interfaces\QueryConcreatInterface;
use Acme\Refactoria\Repositories\CitologiasRepository;
use App\Categoria;
use App\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CitologiaBuild implements QueryConcreatInterface, QueryRequireConcreatInterface
{

    public function __construct()
    {
        $this->categoria = new Categoria();
        $this->factura = new Factura();
    }

    /**
     * @return array
     */
    public function builRequiresController()
    {
        $idCito = $this->categoria->where('status', 1)->pluck('name', 'id');
        $direc = $this->factura->groupBy('direccion_entrega_sede')->select('direccion_entrega_sede')->pluck('direccion_entrega_sede', 'direccion_entrega_sede');
        return array($idCito, $direc);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function builCallController(Request $request)
    {
        $repo = new CitologiasRepository($request);
        $query = new QueryBuilderForms($request, $repo);
        list($bdate, $edate, $pdf, $items) = $query->buidQuery();

        return $this->resultsReturn($bdate, $edate, $pdf, $items);
    }

    /**
     * @param $bdate
     * @param $edate
     * @param $pdf
     * @param $items
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function resultsReturn($bdate, $edate, $pdf, $items)
    {
        $print = new CitologiaHojaTrabajo();
        return $print->printPdfHitoReport($items, $bdate, $edate);
       /* if (!isset($pdf)) {
            return View('reportes.citologia.hojaTrabajo.results', compact('items', 'bdate', 'edate'));
        } else {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('reportes.citologia.hojaTrabajo.results-pdf', compact('items', 'bdate', 'edate'));
            return $pdf->stream();
        }*/
    }

}