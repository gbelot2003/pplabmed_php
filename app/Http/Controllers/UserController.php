<?php

namespace App\Http\Controllers;

use Acme\Helpers\Miselanius;
use Acme\Helpers\UsersControllerHelper;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageUsers');
    }

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
        $helper = new Miselanius();
        $userHelper = new UsersControllerHelper();

        $request = $this->checkPassworldStatus($request);
        $request['status'] = $helper->checkRequestStatus($request);
        $userHelper->storeAndSync($request);
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
        $helper = new Miselanius();
        $userHelper = new UsersControllerHelper();

        $request = $this->checkPassworldStatus($request);
        $request['status'] = $helper->checkRequestStatus($request);

        $userHelper->UpdateAndSync($request, $user);
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
