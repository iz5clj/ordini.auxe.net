<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct() {
        $this->middleware(['role:Super Admin']);
    }
    
    public function index() {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role;
        
        return view('role.createModify')->with([
            'role'   => $role,
            'action' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required'
        ]);

        Role::create(['name' => $request->input('name')]);

        return redirect()
        ->route('roles')
        ->with('success','Il ruolo è stato creato.');
    }

    /**
     * Show the form for editing an existing role
     *
     * @return \Illuminate\Http\Response
     */
    public function modify(Role $role)
    {
        return view('role.createModify')->with([
            'role'     => $role,
            'action'   => 'modify'
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $input = $request->all();
        return $input;

        return redirect()
        ->route('roles')
        ->with('success','Ruolo modificato corretamente.');
    }
    
}
