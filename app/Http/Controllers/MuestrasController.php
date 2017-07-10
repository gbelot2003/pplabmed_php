<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Firma;
use App\Http\Requests\MuestrasRequest;
use App\Muestra;
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
        $body = "El Suscrito medico patólogo de Laboratorios Médicos hace constar que el material
        rotulado con el nombre [], contienen: [].
        Se entrega todo el material en archivo. Y para fines que al interesado convenga estiendo la presente
        en Tegucigalpa M.D.C. a los [] del mes de [] del 20[]
        ";

        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.muestras.create', compact('firmas', 'body'));
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
        if(!$muestra->exist){

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

            return response()->json('error', 500);
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
     * @param MuestrasRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MuestrasRequest $request, $id)
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
            'muestras.id',
            'muestras.serial',
            'firmas.name as name',
            'muestras.created_at',
        ])
            ->Join('firmas', 'muestras.firma_id', '=', 'firmas.id')
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
