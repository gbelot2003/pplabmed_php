<?php

namespace App\Http\Controllers;

use App\Citologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CitologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('showCito', ['only' => ['index']]);
        $this->middleware('createCito', ['only' => ['create', 'store']]);
        $this->middleware('editCito', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $items = Citologia::orderBy('id', 'DESC')->paginate(15);
        return View('resultados.citologia.index', compact('items'));
    }

    public function create()
    {
        return View('resultados.citologia.create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }
}
