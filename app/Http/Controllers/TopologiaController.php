<?php

namespace App\Http\Controllers;

use App\Topologia;
use Illuminate\Http\Request;

class TopologiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('createTopo', ['only' => ['create', 'store']]);
        $this->middleware('editTopo', ['only' => ['edit', 'update', 'state']]);
    }

    public function index()
    {
        $items = Topologia::all();
        return View('parametrizacion.topologia.index', compact('items'));
    }

    public function create()
    {
        return View('parametrizacion.topologia.create');
    }

    public function store(Request $request)
    {
        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $area = Topologia::create($request->all());
        return redirect()->to('/topologia');
    }

    public function edit($id)
    {
        $item = Topologia::findOrFail($id);
        return View('parametrizacion.topologia.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Topologia::findOrFail($id);

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $item->update($request->all());
        return redirect()->to('/topologia');
    }

    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){
        $item = Topologia::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }
}
