<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Super Admin role
        $role = Role::create(['name' => 'Super Admin']);
        
        $user = new User;
        $user->name = "Michel Sabatino";
        $user->email = "ms@auxe.net";
        $user->password = Hash::make('123456');

        $user->save();

        // Assign Super Admin role the new user.
        $user->assignRole('Super Admin');
    }
}
