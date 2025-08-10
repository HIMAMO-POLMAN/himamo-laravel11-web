<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['admin', 'ekraf', 'pubdok'];

        $permissions = [
            'user.view',
            'user.create',
            'user.update',
            'user.delete',

            'role.view',
            'role.create',
            'role.update',
            'role.delete',

            'permission.view',
            'permission.create',
            'permission.update',
            'permission.delete',

            'information.view',
            'information.create',
            'information.update',
            'information.delete',

             'library.view',
            'library.create',
            'library.update',
            'library.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            if ($roleName === 'admin') {
                $role->syncPermissions($permissions);
            }
        }
    }
}
