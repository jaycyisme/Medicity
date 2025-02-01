<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $permissions = [
            'dashboard-access',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'users-list',
            'users-edit',
            'users-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        Permission::create(['name' => 'index-access']);

        $role = Role::create([
            'name' => 'Quản trị viên'
        ]);
        $role->syncPermissions($permissions);

        $user_role = Role::create([
            'name' => 'Thành viên'
        ]);
        $user_role->syncPermissions('index-access');
    }
}
