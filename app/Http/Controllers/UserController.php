<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Hash;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['role:Super Admin']);
    }
    
    public function index() {
        
        $users = User::all();

        return view('user.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $roles = Role::pluck('name', 'name')->all();
        $userRole = '';
        
        return view('user.createModify')->with([
            'user'   => $user,
            'action' => 'create',
            'roles'  => $roles,
            'userRole' => $userRole
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
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role'     => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('role'));


        return redirect()
        ->route('users')
        ->with('success','Utente creato corretamente.');
    }

    /**
     * Show the form for editing an existing user
     *
     * @return \Illuminate\Http\Response
     */
    public function modify(User $user)
    {
        $roles    = Role::all()->pluck('name', 'name')->toArray();
        $userRole = $user->getRoleNames()[0]; //get the first element of the array since we assign just 1 role to each user.

        return view('user.createModify')->with([
            'user'     => $user,
            'roles'    => $roles,
            'userRole' => $userRole,
            'action'   => 'modify'
        ]);
    }

    public function update(Request $request, User $user)
    {
        $input = $request->all();

        if ($request->password) {
            $this->validate($request, [
                'password' => 'required|same:confirm-password'
            ]);
            $input['password'] = Hash::make($input['password']);
        }
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$user->id,
            'role'     => 'required',
        ]);

        $user->name     = $input['name'];
        $user->email    = $input['email'];

        $user->save();

        // sync roles.
        $user->syncRoles($request->input('role'));

        return redirect()
        ->route('users')
        ->with('success','Utente modificato.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
        ->route('users')
        ->with('success','Utente eliminato.');

    }
}
