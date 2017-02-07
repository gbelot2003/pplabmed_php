<?php

namespace App\Http\Controllers;

use App\Morfologia;
use Illuminate\Http\Request;

class MorfologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('createMorfo', ['only' => ['create', 'store']]);
        $this->middleware('editMorfo', ['only' => ['edit', 'update', 'state']]);
    }

    public function index()
    {
        $items = Morfologia::all();
        return View('parametrizacion.morfologia.index', compact('items'));
    }

    public function create()
    {
        return View('parametrizacion.morfologia.create');
    }

    public function store(Request $request)
    {
        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $area = Morfologia::create($request->all());
        return redirect()->to('/morfologia');
    }

    public function edit($id)
    {
        $item = Morfologia::findOrFail($id);
        return View('parametrizacion.morfologia.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Morfologia::findOrFail($id);

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $item->update($request->all());
        return redirect()->to('/morfologia');
    }

    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){
        $item = Morfologia::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }
}
