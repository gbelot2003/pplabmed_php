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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        return redirect()->to(route('muestras.index'));
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
        ]);

        return Datatables::of($items)
            ->addColumn('href', function ($items) {
                return '<a href="/muestras/' . $items->id .'/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
            })
            ->rawColumns(['href'])
            ->make(true);
    }


}
