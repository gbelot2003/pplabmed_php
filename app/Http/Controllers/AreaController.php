<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('createArea', ['only' => ['create', 'store']]);
        $this->middleware('editarFirma', ['only' => ['edit', 'update', 'state']]);
    }

    public function index()
    {
        $items = Area::OrderBY('id', 'DESC')->get();
        return View('parametrizacion.areas.index', compact('items'));
    }

    public function create(Request $request)
    {
        return View('parametrizacion.areas.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        if($request['status'] == 'on'):
            $request['status'] = 1;
         else:
             $request['status'] = 0;
         endif;

        $area = Area::create($request->all());
        flash('Reegistro Creado', 'success')->important();
        return redirect()->to('/areas');
    }

    public function edit($id)
    {

        $item = Area::findOrFail($id);
        return View('parametrizacion.areas.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $item = Area::findOrFail($id);

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $item->update($request->all());
        flash('Reegistro Actualizado', 'success')->important();
        return redirect()->to('/areas');
    }

    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){
        $item = Area::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }
}

