<?php

namespace App\Http\Controllers;

use App\Histopatologia;
use Illuminate\Http\Request;

class HistopatologiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('showHisto', ['only' => ['index']]);
        $this->middleware('createHito', ['only' => ['create', 'store']]);
        $this->middleware('editarFirma', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $items = Histopatologia::orderBy('id', 'DESC')->paginate(15);
        return View('resultados.histopatologia.index', compact('items'));
    }

    public function create()
    {

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
