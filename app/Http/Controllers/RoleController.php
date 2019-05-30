<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

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
        $permissions = Permission::all();
        
        return view('role.createModify')->with([
            'role'        => $role,
            'permissions' => $permissions,
            'action'      => 'create'
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

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

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
        $permissions = Permission::all();

        $rolePermissions = DB::table("role_has_permissions")
        ->where("role_has_permissions.role_id",$role->id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();

        return view('role.createModify')->with([
            'role'            => $role,
            'permissions'     => $permissions,
            'rolePermissions' => $rolePermissions,
            'action'          => 'modify'
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()
        ->route('roles')
        ->with('success','Ruolo modificato corretamente.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()
        ->route('roles')
        ->with('success','Ruolo eliminato.');

    }
    
}
