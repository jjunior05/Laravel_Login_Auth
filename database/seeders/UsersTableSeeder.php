<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin user',
            'email' => 'admin@admin.com',
            'password' => hash::make('senha'),
        ]);

        $author = User::create([
            'name' => 'Author user',
            'email' => 'author@author.com',
            'password' => hash::make('senha'),
        ]);

        $user = User::create([
            'name' => 'Generic user',
            'email' => 'user@user.com',
            'password' => hash::make('senha'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
