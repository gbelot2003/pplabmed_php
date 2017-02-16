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

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }


}
