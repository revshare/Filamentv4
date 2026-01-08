<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create-admin', function () {
    // Check if user already exists to avoid duplicates
    $user = User::firstOrCreate(
        ['email' => 'admin@example.com'],
        [
            'name' => 'Admin User',
            'password' => bcrypt('password123'),
        ]
    );

    $role = Role::firstOrCreate(['name' => 'super_admin']);
    $user->assignRole($role);

    return "Admin user created with role 'admin'.";
});