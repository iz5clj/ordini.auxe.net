<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct() {
        $this->middleware(['role:Super Admin']);
    }

    public function index() {
        $permissions = Permission::all();
        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = new Permission;
        
        return view('permission.createModify')->with([
            'permission' => $permission,
            'action'     => 'create'
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

        Permission::create(['name' => $request->input('name')]);

        return redirect()
        ->route('permissions')
        ->with('success','Il permesso è stato creato.');
    }

    /**
     * Show the form for editing an existing permission
     *
     * @return \Illuminate\Http\Response
     */
    public function modify(Permission $permission)
    {
        return view('permission.createModify')->with([
            'permission'     => $permission,
            'action'         => 'modify'
        ]);
    }


    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->all();

        $permission->name = $input['name'];
        $permission->save();

        return redirect()
        ->route('permissions')
        ->with('success','Permesso modificato corretamente.');
    }
}
