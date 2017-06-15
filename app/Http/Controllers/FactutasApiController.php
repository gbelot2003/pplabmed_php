<?php

namespace App\Http\Controllers;

use Acme\Helpers\DateHelper;
use App\Factura;
use App\Http\Requests\FacturasValidate;
use Acme\Controller\FacturasApiHeper;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;

class FactutasApiController extends Controller
{

    /**
     * @param FacturasValidate|Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $factHelp = new FacturasApiHeper();
        if ($request->has('fecha_nacimiento')){
            $fecha_nac = new DateHelper($request->get('fecha_nacimiento'));
            $request['fecha_nacimiento'] = $fecha_nac->getDate();
        }

        $factura = Factura::create($request->all());

        $factHelp->saveExamenes($request->get('examen'), $factura->num_factura);

        return '200';
    }

}