<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Area::OrderBY('id', 'DESC')->paginate(15);
        return View('parametrizacion.areas.index', compact('items'));
    }

    public function create(Request $request)
    {
        return View('parametrizacion.areas.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        $item = Area::findOrFail($id);
        return View('parametrizacion.area.edit');
    }

    public function update(Request $request, $id)
    {

    }


    public function delete($id)
    {

    }


    public function state($id, $state){
        $item = Area::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }
}

