<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Firma;
use App\Http\Requests\MuestrasRequest;
use App\Muestra;
use App\Plantilla;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\Datatables\Datatables;

class MuestrasController extends Controller
{

    function __construct()
    {
    }

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
        $plantillas = Plantilla::where('type', 2)->where('status', 1)->get();
        return View('resultados.muestras.create', compact('firmas', 'plantillas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MuestrasRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MuestrasRequest $request)
    {
        $muestra = Muestra::create($request->all());



        Audit::create([
            'title' => 'Muestra',
            'action' => 'creación',
            'details' => 'ID: '. $muestra->id .' numero: ' . $muestra->num_factura,
            'user_id' => 1
        ]);

        flash('Registro Creado', 'success')->important();
        return redirect()->to(action('MuestrasController@edit', $muestra->id));
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

        $plantillas = Plantilla::where('type', 2)->where('status', 1)->get();
        return View('resultados.muestras.edit', compact('firmas', 'items', 'plantillas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MuestrasRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MuestrasRequest $request, $id)
    {
        $muestra = Muestra::findOrFail($id);
        $muestra->update($request->all());
        flash('Registro Actualizado', 'success')->important();
        return redirect()->to(action('MuestrasController@edit', $muestra->id));
    }

    /**
     * request ajax de listados en index
     */

    public function listados()
    {
        $items = Muestra::select([
            'muestras.id',
            'muestras.factura_id',
            'muestras.serial',
            'firmas.name as name',
            'facturas.nombre_completo_cliente',
            'muestras.created_at',
        ])
            ->Join('firmas', 'muestras.firma_id', '=', 'firmas.id')
            ->Join('histopatologias', 'histopatologias.serial', '=', 'muestras.serial')
            ->Join('facturas', 'histopatologias.factura_id', '=', 'facturas.num_factura')
            ->orderBy('serial', 'DESC')
            ->limit(1500)
            ->get();

        return Datatables::of($items)
            ->addColumn('href', function ($items) {
                return '<a href="/muestras/' . $items->id . '/edit" class="btn btn-xs btn-primary">Ver Detalle</a>';
            })
            ->addColumn('finforme', function ($items) {
                return $items->created_at->format('d/m/Y');
            })

            ->rawColumns(['href'])
            ->make(true);
    }


}
