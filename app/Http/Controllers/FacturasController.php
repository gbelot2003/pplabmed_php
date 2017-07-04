<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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
     * @param Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function listados()
    {
        $facturas = Factura::select([
            'num_factura',
            'nombre_completo_cliente',
            'correo',
            'medico',
            'created_at'
        ])
            ->orderBy('num_factura', 'ASC')
            ->get();
        return Datatables::of($facturas)
            ->addColumn('href', function($facturas){
                return '<a href="facturas/'.$facturas->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Ver</a>';
            })
            ->rawColumns(['href'])
            ->make(true);
    }
}
