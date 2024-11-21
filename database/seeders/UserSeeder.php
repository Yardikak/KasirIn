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
        // Membuat peran dan izin (optional)
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        // $permission = Permission::create(['name' => 'manage articles']);

        // Membuat pengguna admin
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('superadmin'), // Buat password terenkripsi
        ]);


        // Memberikan peran dan izin kepada pengguna admin
        $admin->assignRole($adminRole);
        // $admin->givePermissionTo($permission);

        // Membuat pengguna biasa
        $user = User::create([
            'name' => 'W.R. Supratman',
            'email' => 'supri@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Memberikan peran 'user' kepada pengguna biasa
        $user->assignRole($userRole);
    }
}
