<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Citologia;
use App\CitoSerial;
use App\CitoUnbind;
use App\Firma;
use App\Gravidad;
use App\Http\Requests\CitologiaValidate;
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
        $items = Citologia::orderBy('id', 'DESC')->paginate(10);
        $serial = CitoSerial::findOrFail(1);


        return View('resultados.citologia.index', compact('items', 'serial'));
    }

    public function create()
    {
        $serial = $this->getSerial();
        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $gravidad = Gravidad::where('status', 1)->pluck('name', 'id');

        return View('resultados.citologia.create', compact('idCIto', 'firmas', 'gravidad', 'serial'));
    }

    public function store(CitologiaValidate $request)
    {
        $cito = Citologia::create($request->all());
        $cito->facturas->update($request->all());

        $this->setSerial($request->input('serial'));
        flash('Reegistro Creado', 'success')->important();
        return redirect()->action('CitologiaController@index');
    }

    public function edit($id)
    {
        $item = Citologia::findOrFail($id);
        $idCIto = Categoria::where('status', 1)->pluck('name', 'id');
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        $gravidad = Gravidad::where('status', 1)->pluck('name', 'id');
        return View('resultados.citologia.edit', compact('item','idCIto', 'firmas', 'gravidad'));
    }

    public function update(CitologiaValidate $request, $id)
    {

        //dd($request->all());
        $cito = Citologia::findOrFail($id);
        $cito->update($request->all());
        $cito->facturas->update($request->all());

        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->action('CitologiaController@index');
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

























