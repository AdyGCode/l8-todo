<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSeeder =
            [
                [
                    'name' => 'Admin',
                    'permission' => Permission::pluck('id', 'id')->all(),
                ],
                [
                    'name' => 'Manager',
                    'permission' => [
                        'role-list',
                        'user-list',
                        'user-create',
                        'user-edit',
                        'user-delete',
                        'homepage',
                        'dashboard',
                    ],
                ],
                [
                    'name' => 'User',
                    'permission' => [
                        'todo-list',
                        'todo-create',
                        'todo-edit',
                        'todo-delete',
                        'homepage',
                        'dashboard',
                    ],
                ],
                [
                    'name' => 'Guest',
                    'permission' => [
                        'homepage'
                    ],
                ],
            ];


        foreach ($roleSeeder as $role) {
            $role = Role::create(['name'=>$role['name']]);
            $permissions = $role['permission'] ;
            $role->syncPermissions($permissions);
        }
    }
}
