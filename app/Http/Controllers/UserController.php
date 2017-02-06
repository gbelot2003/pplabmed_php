<?php

namespace App\Http\Controllers;

use App\Role;
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
        $roles = Role::pluck('display_name', 'id');
        return View('seguridad.usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password_confirmation']);
        else:
            unset($request['password']);
            unset($request['password_confirmation']);
        endif;

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $item = User::create($request->all());
        if($request->input('roles_list')){
            if(!is_array($request->input('roles_list'))){
            }else {
                $item->roles()->sync($request->input('roles_list'));
            }
        }
        return redirect()->to('/usuarios');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $item = User::findOrfail($id);
        $roles = Role::pluck('display_name', 'id');
        return View('seguridad.usuarios.edit', compact('item', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->input('password')):
            $request['password'] = bcrypt($request->input('password'));
            unset($request['password_confirmation']);
        else:
            unset($request['password']);
            unset($request['password_confirmation']);
        endif;

        if($request['status'] == 'on'):
            $request['status'] = 1;
        else:
            $request['status'] = 0;
        endif;

        $user->update($request->all());
        if($request->input('roles_list')){
            if(!is_array($request->input('roles_list'))){
            }else {
                $user->roles()->sync($request->input('roles_list'));
            }
        }
        return redirect()->to('/usuarios');
    }

    /**
     * @param $id
     * @param $state
     * @return mixed
     */
    public function state($id, $state){
        $item = User::findOrFail($id);
        $item->status = $state;
        $item->update();
        return $item->name;
    }
}
