<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Factura;
use App\Http\Requests\FacturasValidate;
use Acme\Controller\FacturasApiHeper;
use Atlas\Helpers\DateHelper;
use Carbon\Carbon;
use GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FactutasApiController extends Controller
{

    /**
     * @param FacturasValidate|Request $request
     * @return string
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $factHelp = new FacturasApiHeper();

        if ($request->has('status')) {
            $status = $request->get('status');
            if ($status != 'Valida') {
                return $this->rewriteFile($request);
            }
        }

        if ($request->has('fecha_nacimiento')) {
            $fecha_nac = new DateHelper($request->get('fecha_nacimiento'));
            $request['fecha_nacimiento'] = $fecha_nac->getDate();

            $age = $request->get('fecha_nacimiento');
            $calcage =  Carbon::parse($age)->diff(Carbon::now())->format('%y');

            if($calcage <= 0){
                $cage = Carbon::parse($age)->diff(Carbon::now())->format('%m M');
            } else {
                $cage = Carbon::parse($age)->diff(Carbon::now())->format('%y A');
            }

            $request['edad'] = $cage;
        }

        $factura = Factura::create($request->all());

        if ($factura->exists) {

            Audit::create([
                'title' => 'Factura API',
                'action' => 'creación',
                'details' => 'Factura: ' . $factura->num_factura,
                'user_id' => 1
            ]);

            if ($request->has('examen')) {
                $factHelp->saveExamenes($request->get('examen'), $factura->num_factura);
            }
            return '200';
        } else {
            return response()->json('error', 500);
        }




    }

    /**
     * @param Request $request
     * @return string
     */
    protected function rewriteFile(Request $request)
    {
        $fac_num = $request->get('num_factura');
        $factura = Factura::where('num_factura', $fac_num)->first();
        $factura->status = 'Anulada';
        $factura->save();
        return '200';
    }

}