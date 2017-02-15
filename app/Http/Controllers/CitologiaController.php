<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Citologia;
use App\Factura;
use App\Firma;
use App\Gravidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class
CitologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('showCito', ['only' => ['index']]);
        $this->middleware('createCito', ['only' => ['create', 'store']]);
        $this->middleware('editCito', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $items = Citologia::orderBy('id', 'DESC')->paginate(15);
        return View('resultados.citologia.index', compact('items'));
    }

    public function create()
    {
        $idCIto = Categoria::pluck('name', 'id');
        $firmas = Firma::pluck('name', 'id');
        $gravidad = Gravidad::pluck('name', 'id');
        return View('resultados.citologia.create', compact('idCIto', 'firmas', 'gravidad'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $facturas = Factura::where('num_factura', $request->input('factura_id'))->first();

        $facturas->update([
            'nombre_completo_cliente' => $request->input('paciente'),
            'direccion_entrega_sede' => $request->input('direccion'),
            'correo' => $request->input('email'),
            'sexo' => $request->input('sexo'),
        ]);

        $cito = Citologia::create([
            'factura_id' => $request->input('factura_id'),
            'deteccion_cancer' => $request->input('deteccion_cancer'),
            'indice_maduracion' => $request->input('indice_maduracion'),
            'otros_a' => $request->input('otros_a'),
            'diagnostico_clinico' => $request->input('diagnostico_clinico'),
            'fur' => $request->input('fur'),
            'fup' => $request->input('fup'),
            'gravidad_id' => $request->input('gravidad_id'),
            'para' => $request->input('para'),
            'abortos' => $request->input('abortos'),
            'citologia_id' => $request->input('citologia_id'),
            'firma_id' => $request->input('firma_id'),
            'fecha_informe' => $request->input('fecha_informe'),
            'otros_b' => $request->input('otros_b'),
            'firma2_id' => $request->input('firma2_id'),
            'fecha_muestra' => $request->input('fecha_muestra'),
            'mm' => $request->input('mm'),
            'muestra' => $request->input('muestra'),
            'informe' => $request->input('sexo'),
            'adendum' => $request->input('adendum'),
        ]);



        return redirect()->action('CitologiaController@index');


    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }
}
