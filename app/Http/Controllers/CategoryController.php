<?php

namespace App\Http\Controllers;

use Acme\Helpers\Miselanius;
use App\Audit;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageIds');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Categoria::OrderBY('id', 'DESC')->get();
        return View('parametrizacion.categorias.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('parametrizacion.categorias.create');
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
        $item = Categoria::create($request->all());

        Audit::create([
            'title' => 'Id Citologías',
            'action' => 'creación',
            'details' => 'Rol ID: ' . $item->id,
            'user_id' => Auth::user()->id
        ]);

        flash('Reegistro Creado', 'success')->important();
        return redirect()->to('/categorias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Categoria::findOrFail($id);
        return View('parametrizacion.categorias.edit', compact('item'));
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
        $check = new Miselanius();
        $item = Categoria::findOrFail($id);
        $request['status'] = $check->checkRequestStatus($request);
        $item->update($request->all());

        Audit::create([
            'title' => 'Id Citologías',
            'action' => 'edición',
            'details' => 'Rol ID: ' . $item->id,
            'user_id' => Auth::user()->id
        ]);

        flash('Reegistro Creado', 'success')->important();
        return redirect()->to('/categorias');
    }


    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){
        $item = Categoria::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }
}
