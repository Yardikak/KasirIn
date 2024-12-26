<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Role
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        
        // Create permission
        $permission = Permission::create(['name' => 'view dashboard']);
        $permission = Permission::create(['name' => 'create payments']);
        $permission = Permission::create(['name' => 'create orders']);
        $permission = Permission::create(['name' => 'manage menus']);
        $permission = Permission::create(['name' => 'manage categories']);
        $permission = Permission::create(['name' => 'manage category_menus']);
        $permission = Permission::create(['name' => 'manage additionals']); 
        $permission = Permission::create(['name' => 'manage menu_additionals']); 
        $permission = Permission::create(['name' => 'manage variants']);
        $permission = Permission::create(['name' => 'manage additional_variants']);
        $permission = Permission::create(['name' => 'manage tables']);
        $permission = Permission::create(['name' => 'manage customers']);

        // Membuat pengguna admin
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('superadmin'),
        ]);

        // Memberikan peran dan izin kepada pengguna admin
        $admin->assignRole('admin');

        /*******************************/

        // Membuat pengguna biasa
        $user = User::create([
            'name' => 'W.R. Supratman',
            'email' => 'supri@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Memberikan peran 'user' kepada pengguna biasa
        $user->assignRole('user');
    }
}
