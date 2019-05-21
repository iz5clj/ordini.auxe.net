<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Hash;

class UserController extends Controller
{
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


        return redirect()->route('users')
                        ->with('success','User created successfully');
    }

    /**
     * Show the form for editing an existing user
     *
     * @return \Illuminate\Http\Response
     */
    public function modify(User $user)
    {
        $roles    = Role::all()->pluck('name', 'id')->toArray();
        $userRole = $user->getRoleNames();

        return view('user.createModify')->with([
            'user'     => $user,
            'roles'    => $roles,
            'userRole' => $userRole,
            'action'   => 'modify'
        ]);
    }
}
