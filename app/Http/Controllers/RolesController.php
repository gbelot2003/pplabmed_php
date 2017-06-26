<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkActive');
        $this->middleware('ManageRols');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Role::all();
        return View('seguridad.roles.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perms = Permission::pluck('display_name', 'id');
        return View('seguridad.roles.create', compact('item', 'perms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->perms()->sync($request->input('perms_lists'));

        Audit::create([
            'title' => 'Roles',
            'action' => 'creación',
            'details' => 'Rol ID: ' . $role->id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->to('/roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Role::findOrFail($id);
        $perms = Permission::pluck('display_name', 'id');
        return View('seguridad.roles.edit', compact('item', 'perms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        $role->perms()->sync($request->input('perms_lists'));

        Audit::create([
            'title' => 'Roles',
            'action' => 'edición',
            'details' => 'Rol ID: ' . $role->id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->to('/roles');
    }
}
