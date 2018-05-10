<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Factura;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class FacturasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ShowFact');
    }

    /**
     * @return View
     */
    public function index()
    {
        return View('resultados.facturas.index');
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        return View('resultados.facturas.edit', compact('factura'));
    }

    /**
     *
     */
    public function update(Request $request, $id)
    {
        $item = Factura::where('num_factura', $id)->first();

        $item->update($request->all());

        $audit =  new Audit();

        $audit->create([
            'title' => 'Facturas',
            'action' => 'Edición directa',
            'details' => $id,
            'user_id' => Auth::user()->id
        ]);

        return response()->json($item, 200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $item = Factura::where('num_factura', $id)->with('examen')->first();
        return $item;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @internal param Datatables $datatables
     */
    public function listados()
    {
        $facturas = Factura::select([
            'facturas.id',
            'facturas.num_factura',
            'facturas.nombre_completo_cliente',
            'examenes.nombre_examen as nombre_examen',
            'facturas.correo',
            'facturas.medico',
            'facturas.created_at'
        ])
            ->Join('examenes', 'examenes.num_factura', '=', 'facturas.num_factura')
            ->orderBy('num_factura', 'DESC');

        return Datatables::of($facturas)
            ->addColumn('href', function($facturas){
                return '<a href="facturas/'.$facturas->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Ver</a>';
            })
            ->rawColumns(['href'])
            ->make(true);
    }
}
