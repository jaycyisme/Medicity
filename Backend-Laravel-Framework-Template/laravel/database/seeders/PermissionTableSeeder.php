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
            'users-delete',
            'speciality-list',
            'speciality-create',
            'speciality-edit',
            'speciality-delete',
            'clinic-list',
            'clinic-create',
            'clinic-edit',
            'clinic-delete',
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',
            'laboratory-test-list',
            'laboratory-test-create',
            'laboratory-test-edit',
            'laboratory-test-delete',
            'prescription-list',
            'prescription-create',
            'prescription-edit',
            'prescription-delete',
            'appointment-list',
            'appointment-create',
            'appointment-edit',
            'appointment-delete',
            'disease-list',
            'disease-create',
            'disease-edit',
            'disease-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        Permission::create(['name' => 'index-access']);

        $admin_role = Role::create([
            'name' => 'Admin'
        ]);
        $admin_role->syncPermissions($permissions);

        $user_role = Role::create([
            'name' => 'User'
        ]);
        $user_role->syncPermissions('index-access');

        $doctor_role = Role::create([
            'name' => 'Doctor'
        ]);
    }
}
