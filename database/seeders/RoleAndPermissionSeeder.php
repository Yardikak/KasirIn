<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        //Permissions
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

        // Assign Permissions to Role
        $admin->givePermissionTo($permission);

        $user->givePermissionTo([
            'view dashboard',
            'create payments',
            'create orders',
            'manage tables',
            'manage customers',
        ]);
    }
}
