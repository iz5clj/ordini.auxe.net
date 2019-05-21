<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
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




    
}
