<?php

namespace App\Http\Controllers;

use App\CitoSerial;
use App\CitoUnbind;
use App\Factura;
use App\Firma;
use App\Histopatologia;
use App\Http\Requests\HistopatiaValidation;

class HistopatologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('showHisto', ['only' => ['index']]);
        $this->middleware('createHito', ['only' => ['create', 'store']]);
        $this->middleware('editarFirma', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $items = Histopatologia::orderBy('id', 'DESC')->paginate(15);
        return View('resultados.histopatologia.index', compact('items'));
    }

    public function create()
    {
        $serial = $this->getSerial();
        $firmas = Firma::where('status', 1)->pluck('name', 'id');

        return View('resultados.histopatologia.create', compact('serial', 'firmas'));
    }

    public function store(HistopatiaValidation $request)
    {
        //dd($request->all());
        $histo = Histopatologia::create($request->all());
        $histo->facturas->update($request->all());
        $this->setSerial($request->input('serial'));

        flash('Reegistro Creado', 'success')->important();
        return redirect()->action('HistopatologiaController@index');
    }

    public function edit($id)
    {
        $item = Histopatologia::findOrFail($id);
        $firmas = Firma::where('status', 1)->pluck('name', 'id');
        return View('resultados.histopatologia.edit', compact('item', 'firmas', 'postId'));
    }

    public function update(HistopatiaValidation $request, $id)
    {
        $item = Histopatologia::findOrFail($id);
        $item->update($request->all());
        $item->facturas->update($request->all());

        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->action('HistopatologiaController@index');
    }

    public function delete($id)
    {
    }

    /**
     * @param $req
     */
    public function setSerial($req)
    {

        $preserial = CitoSerial::findOrFail(2);
        $serial = ($preserial->serial + 1);

        if($serial != $req){
            $getSerial = CitoUnbind::where('unbind', $req)->first();
            $getSerial->delete();
        } else {
            $getSerial = CitoSerial::findOrFail(2);
            $getSerial->serial = $req;
            $getSerial->update();
        }
    }
    /**
     * @return mixed
     */
    public function getSerial()
    {
        $getSerial = CitoSerial::findOrFail(2);
        $sserial = $getSerial->serial;
        $serial = ($sserial + 1);
        return $serial;
    }
}
