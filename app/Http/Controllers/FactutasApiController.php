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
use Illuminate\Support\Facades\DB;

class FactutasApiController extends Controller
{

    function __construct()
    {
        $this->factHelp = new FacturasApiHeper();
    }

    /**
     * @param FacturasValidate|Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $prerequest = $this->factHelp->formatRequest($request);

        if ($prerequest->has('status')) {
            $status = $prerequest->get('status');
            if ($status != 'Valida') {
                return $this->factHelp->rewriteFile($prerequest);
            }
        }

        $result = DB::transaction(function () use ($prerequest) {

            try {
                $factura = Factura::create($prerequest->all());
                $audit = Audit::create([
                    'title' => 'Factura API',
                    'action' => 'creación',
                    'details' => 'Factura: ' . $factura->num_factura,
                    'user_id' => 1
                ]);
                if ($prerequest->has('examen')) {
                    $this->factHelp->saveExamenes($prerequest->get('examen'), $factura->num_factura);
                }

                return '200';

            } catch (\Exception $e) {
                return response()->json('error', 500);
            }

        }, 10);

        return $result;
    }
}