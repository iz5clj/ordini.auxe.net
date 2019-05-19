<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class SuperAdmincontroller extends Controller
{
    /**
     * Show the form to create a super user
     */
    public function showForm()
    {
        return view('create-super-admin');
    }

    public function saveData(Request $request)
    {
        // Create new user: the first one.
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // create Super Admin role
        $role = Role::create(['name' => 'Super Admin']);

        // Assign Super Admin role the new user.
        $user->assignRole('Super Admin');

        // login new created user
        Auth::login($user, TRUE);

        return redirect(route('home'));
    }
}
