<?php
namespace Acme\Controller;

use App\Audit;
use App\Examenes;
use App\Factura;
use App\Http\Requests\FacturasValidate;
use Atlas\Helpers\DateHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;

Class FacturasApiHeper {

    /**
     * @param $examenes
     * @param $num_factura
     */
    public function saveExamenes($examenes, $num_factura)
    {
        if(array_key_exists(0, $examenes) ) {
            foreach ($examenes as $val) {
                $examen = Examenes::create( [
                    'item' => $val['codigo_examen'],
                    'num_factura' => $num_factura,
                    'nombre_examen' => $val['nombre_examen']
                ]);
            }
        }  else {

            $examen = Examenes::create( [
                'item' => $examenes['codigo_examen'],
                'num_factura' => $num_factura,
                'nombre_examen' => $examenes['nombre_examen']
            ]);
        }
    }

    /**
     * @param Request $request
     * @return Request
     */
    public function formatRequest(Request $request)
    {
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

        return $request;
    }


    /**
     * @param Request $request
     * @return string
     */
    public function rewriteFile(Request $request)
    {
        $fac_num = $request->get('num_factura');
        $factura = Factura::where('num_factura', $fac_num)->first();
        $factura->status = 'Anulada';
        $factura->save();
        return '200';
    }
}
