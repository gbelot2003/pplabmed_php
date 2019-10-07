<?php

namespace App\Http\Controllers;

use Acme\Helpers\Miselanius;
use App\Audit;
use App\Plantilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantillasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageTemplates');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = Plantilla::orderBy('id', 'DESC')->get();
        return View('plantillas.index', compact('items'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return View('plantillas.create', compact('items'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $items = new Plantilla();

        $helper = new Miselanius();
        $request['status'] = $helper->checkRequestStatus($request);
        $items->create($request->all());

        Audit::create([
            'title' => 'Plantillas',
            'action' => 'creación',
            'details' => 'Plantillas ID: ' . $items->id,
            'user_id' => Auth::user()->id
        ]);

        flash('Reegistro Creado', 'success')->important();
        return redirect()->to(action('PlantillasController@index'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $item = Plantilla::findOrFail($id);
        return View('plantillas.edit', compact('item'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $item = Plantilla::findOrFail($id);

        $helper = new Miselanius();
        $request['status'] = $helper->checkRequestStatus($request);
        $item->update($request->all());

        Audit::create([
            'title' => 'Plantillas',
            'action' => 'edición',
            'details' => 'Plantillas ID: ' . $item->id,
            'user_id' => Auth::user()->id
        ]);

        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->to(action('PlantillasController@index'));
    }

    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){
        $item = Plantilla::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }

    /**
     * @param $type
     * @return mixed
     */
    public function listado($type)
    {
        $item = Plantilla::where('type', $type)->get();
        return $item;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPlantilla($id)
    {
        $item = Plantilla::findOrFail($id);
        return $item;
    }

}
