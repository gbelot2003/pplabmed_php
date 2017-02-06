<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $items = User::all();
        return View('seguridad.usuarios.index', compact('items'));
    }

    public function create()
    {
        return View('seguridad.usuarios.create');
    }

    public function store()
    {
    }

    public function edit()
    {
        return View('seguridad.usuarios.edit');
    }

    public function update()
    {
    }

    public function state($id, $status)
    {
    }
}
