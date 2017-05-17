<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Http\Requests\FacturasValidate;
use Acme\Controller\FacturasApiHeper;

class FactutasApiController extends Controller
{

    /**
     * @param FacturasValidate $request
     * @return string
     */
    public function store(FacturasValidate $request)
    {
        $factHelp = new FacturasApiHeper();

        $request['fecha_nacimiento'] = $factHelp->setFecha($request->get('fecha_nacimiento'));
        $request['edad'] = $factHelp->setEdad($request->get('edad'));

        $factura = Factura::create($request->all());
        $examenes = $factura->examenes;
        foreach ($examenes as $examen){
            $factura->examenes->create($request->all());
        }

        return '200';
    }

}