<?php

namespace App\Http\Controllers;

use Acme\Helpers\Miselanius;
use App\Firma;
use Illuminate\Http\Request;

class FirmasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageFirmas');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Firma::orderBy('id', 'DESC')->get();
        return View('parametrizacion.firmas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('parametrizacion.firmas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = new Miselanius();
        $request['status'] = $check->checkRequestStatus($request);
        $firma = Firma::create($request->all());
        flash('Reegistro Creado', 'success')->important();
        return redirect()->to('/firmas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Firma::findOrFail($id);
        return View('parametrizacion.firmas.edit', compact('item'));
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
        $item = Firma::findOrFail($id);
        $check = new Miselanius();
        $request['status'] = $check->checkRequestStatus($request);
        $item->update($request->all());
        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->to('/firmas');
    }

    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){
        $item = Firma::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }
}
