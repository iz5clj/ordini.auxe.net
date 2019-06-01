<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Hash;
use Image;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['role:Super Admin'])->except(['profile', 'profileUpdate']);
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

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $name = str_replace(' ', '', $request->input('name'));
    		$filename = $name . time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save( public_path('/uploads/avatar/' . $filename ) );
        } else {
            $filename = "default.jpg";
        }

        $user           = new User;
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->avatar   = $filename;

        $user->save();

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
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$user->id,
            'role'     => 'required',
            'password' => 'same:confirm-password',
        ]);

        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
            $name = str_replace(' ', '', $request->input('name'));
    		$filename = $name . time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save( public_path('/uploads/avatar/' . $filename ) );
            $user->avatar = $filename;
        }

        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        
        if($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

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

    /*
     * Show user profile form
     */
    public function profile()
    {
        $user = User::findOrFail(auth()->id());
        return view('user.profile', compact('user'));

    }

    public function profileUpdate(Request $request, User $user)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:confirm-password'
        ]);

        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save( public_path('/uploads/avatar/' . $filename ) );
            $user->avatar = $filename;
        }

        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        
        if($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()
        ->route('home')
        ->with('success','Dati del tuo profile modificati.');
    }
}
