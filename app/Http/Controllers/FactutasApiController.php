<?php

namespace App\Http\Controllers;

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
    public function store(FacturasValidate $request)
    {
        $factHelp = new FacturasApiHeper();
        $request['fecha_nacimiento'] = $factHelp->setFecha( $request->get( 'fecha_nacimiento' ) );
        $request['edad'] = $factHelp->setEdad( $request->get( 'edad' ) );

        $factura = Factura::create($request->all());

        $factHelp->saveExamenes( $request->get('examen'), $factura->num_factura);

        return '200';
    }

}