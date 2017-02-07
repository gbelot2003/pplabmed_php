<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');

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
        if($request['status'] == 'on'):
            $request['status'] = 1;
         else:
             $request['status'] = 0;
         endif;

        $area = Area::create($request->all());
        return redirect()->to('/areas');
    }

    public function edit($id)
    {
        $item = Area::findOrFail($id);
        return View('parametrizacion.areas.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Area::findOrFail($id);

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $item->update($request->all());
        return redirect()->to('/areas');
    }


    public function delete($id)
    {

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

