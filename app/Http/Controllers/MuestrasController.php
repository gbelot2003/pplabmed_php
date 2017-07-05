<?php

namespace App\Http\Controllers;

use App\Firma;
use App\Muestra;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\Datatables\Datatables;

class MuestrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('resultados.muestras.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.muestras.create', compact('firmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $muestra = Muestra::create($request->all());
        if($muestra->exist){

            Audit::create([
                'title' => 'Muestra',
                'action' => 'creación',
                'details' => 'ID: '. $muestra->id .' numero: ' . $muestra->num_factura,
                'user_id' => 1
            ]);

            return redirect()->to(action('MuestrasController@edit', $muestra->id));
        } else {

            Audit::create([
                'title' => 'Muestra',
                'action' => 'creación error',
                'details' => 'ID: '. $muestra->id .' numero: ' . $muestra->num_factura,
                'user_id' => 1
            ]);

            return response()->json('error', 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Muestra::findOrFail($id);
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.muestras.edit', compact('firmas', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $muestra = Muestra::findOrFail($id);
        $muestra->update($request->all());

        return redirect()->to(action('MuestrasController@edit', $muestra->id));
    }

    /**
     * request ajax de listados en index
     */

    public function listados()
    {
        $items = Muestra::select([
            'id',
            'serial',
            'created_at',
        ])
            ->orderBy('serial', 'DESC')
            ->limit(1500)
            ->get();

        return Datatables::of($items)
            ->addColumn('href', function ($items) {
                return '<a href="/muestras/' . $items->id . '/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
            })
            ->rawColumns(['href'])
            ->make(true);
    }


}
