<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Citologia;
use App\CitoSerial;
use App\CitoUnbind;
use App\Factura;
use App\Firma;
use App\Gravidad;
use App\Plantilla;
use Illuminate\Http\Request;
use Auth;

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

    public $flag;

    public function index()
    {
        $items = Citologia::orderBy('id', 'DESC')->paginate(15);
        return View('resultados.citologia.index', compact('items'));
    }

    public function create()
    {

        $serial = $this->getSerial();
        $idCIto = Categoria::pluck('name', 'id');
        $firmas = Firma::pluck('name', 'id');
        $gravidad = Gravidad::pluck('name', 'id');
        $plan = Plantilla::where('type', 1)
            ->where('status', 1)->get();

        return View('resultados.citologia.create', compact('idCIto', 'firmas', 'gravidad', 'plan', 'serial'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $facturas = Factura::where('num_factura', $request->input('factura_id'))->first();

        $facturas->update([
            'nombre_completo_cliente' => $request->input('paciente'),
            'direccion_entrega_sede' => $request->input('direccion'),
            'edad' => $request->input('edad'),
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
            'serial' => $request->input('serial'),
            'user_id' => Auth::User()->id,
        ]);

       $this->setSerial($request->input('serial'));

        return redirect()->action('CitologiaController@index');

    }

    public function edit($id)
    {
        $item = Citologia::findOrFail($id);
        $fact = Factura::where('num_factura', $item->factura_id)->first();
        $idCIto = Categoria::pluck('name', 'id');
        $firmas = Firma::pluck('name', 'id');
        $gravidad = Gravidad::pluck('name', 'id');
        $plan = Plantilla::where('type', 1)
            ->where('status', 1)->get();
        return View('resultados.citologia.edit', compact('item','idCIto', 'firmas', 'gravidad', 'fact', 'plan'));
    }

    public function update(Request $request, $id)
    {

        $cito = Citologia::findOrFail($id);

        $facturas = Factura::where('num_factura', $request->input('factura_id'))->first();

        $facturas->update([
            'nombre_completo_cliente' => $request->input('paciente'),
            'direccion_entrega_sede' => $request->input('direccion'),
            'edad' => $request->input('edad'),
            'correo' => $request->input('email'),
            'sexo' => $request->input('sexo'),
        ]);

        $cito->update([
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
            'user_id' => Auth::User()->id,
        ]);


        return redirect()->action('CitologiaController@index');
    }

    public function delete($id)
    {
    }

    public function getSerial()
    {
        $unbind = CitoUnbind::first();
        if($unbind){
            $serial =  $unbind->unbind;
        } else {
            $getSerial = CitoSerial::findOrFail(1);
            $sserial = $getSerial->serial;
            $serial = ($sserial + 1);
        }

        return $serial;
    }

    public function setSerial($req)
    {

        $preserial = CitoSerial::findOrFail(1);
        $serial = ($preserial->serial + 1);

        if($serial != $req){
            $getSerial = CitoUnbind::where('unbind', $req)->first();
            $getSerial->delete();
        } else {
            $getSerial = CitoSerial::findOrFail(1);
            $getSerial->serial = $req;
            $getSerial->update();
        }

    }
}

























