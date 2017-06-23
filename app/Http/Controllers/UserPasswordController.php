<?php

namespace App\Http\Controllers;


class UserPasswordController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return View('seguridad.usuarios.password');
    }
}