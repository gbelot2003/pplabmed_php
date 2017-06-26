<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Http\Requests\FacturasValidate;
use Acme\Controller\FacturasApiHeper;
use Atlas\Helpers\DateHelper;
use GuzzleHttp\Promise\all;
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


        if ($request->has('status')){
            $status = $request->get('status');
            if ($status != 'Valida'){
                return $this->rewriteFile($request);
            }
        }

        if ($request->has('fecha_nacimiento')){
            $fecha_nac = new DateHelper($request->get('fecha_nacimiento'));
            $request['fecha_nacimiento'] = $fecha_nac->getDate();
        }

        $factura = Factura::create($request->all());

        if ($request->has('examen')){
            $factHelp->saveExamenes($request->get('examen'), $factura->num_factura);
        }

        return '200';
    }

    /**
     * @param Request $request
     * @return string
     */
    protected function rewriteFile(Request $request): string
    {
        $fac_num = $request->get('num_factura');
        $factura = Factura::where('num_factura', $fac_num)->first();
        $factura->status = 'Anulada';
        $factura->save();
        return '200';
    }

}