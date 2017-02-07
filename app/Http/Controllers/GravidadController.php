<?php

namespace App\Http\Controllers;

use App\Gravidad;
use Illuminate\Http\Request;

class GravidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');

    }

    public function index()
    {
        $items = Gravidad::all();
        return view('parametrizacion.gravidad.index', compact('items'));
    }

    public function create()
    {
        return view('parametrizacion.gravidad.create');
    }

    public function store(Request $request)
    {
        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $area = Gravidad::create($request->all());
        return redirect()->to('/gravidad');
    }


    public function edit($id)
    {
        $item = Gravidad::findOrfail($id);
        return View('parametrizacion.gravidad.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $item = Gravidad::findOrFail($id);

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $item->update($request->all());
        return redirect()->to('/gravidad');
    }

    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){
        $item = Gravidad::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }

}
