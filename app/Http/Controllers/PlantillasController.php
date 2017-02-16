<?php

namespace App\Http\Controllers;

use App\Plantilla;
use Illuminate\Http\Request;

class PlantillasController extends Controller
{

    public function index()
    {
        $items = Plantilla::orderBy('id', 'DESC')->paginate(10);
        return View('plantillas.index', compact('items'));
    }

    public function create()
    {
        return View('plantillas.create', compact('items'));
    }

    public function store(Request $request)
    {
        $items = new Plantilla();

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $items->create($request->all());

        return redirect()->to(action('PlantillasController@index'));
    }

    public function edit(Request $request, $id)
    {
        $item = Plantilla::findOrFail($id);
        return View('plantillas.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Plantilla::findOrFail($id);

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $item->update($request->all());
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

    public function listado($type)
    {
        $item = Plantilla::where('type', $type)->get();
        return $item;
    }

    public function getPlantilla($id)
    {
        $item = Plantilla::findOrFail($id);
        return $item;
    }

}
