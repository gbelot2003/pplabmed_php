<?php

namespace App\Http\Controllers;


use App\Audit;
use App\Http\Requests\PasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class UserPasswordController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $auth = Auth::user()->id;

        $user = User::findOrFail($auth);

        return View('seguridad.usuarios.password', compact('user'));
    }

    public function changePassword(PasswordRequest $request)
    {
        $id = $request->get('user_id');
        $pass = $request->get('password');

        $user = User::findOrFail($id);
        $user->password = bcrypt($pass);

        Audit::create([
            'title' => 'Usuario',
            'action' => 'Cambio de password',
            'details' => 'Plantillas ID: ' . $user->id,
            'user_id' => Auth::user()->id
        ]);

        $user->save();

        flash('Password a sido modificado', 'success')->important();
        return redirect()->to('/home');
    }
}