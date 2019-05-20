<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        return view('user.createModify')->with([
            'user'   => $user,
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Show the form for editing an existing user
     *
     * @return \Illuminate\Http\Response
     */
    public function modify($id)
    {
        $user = User::find($id);
        
        return view('user.createModify')->with([
            'user'   => $user,
            'action' => 'modify'
        ]);
    }
}
