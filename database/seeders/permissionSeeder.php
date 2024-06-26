<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class permissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions= [
            'create post',
            'read post',
            'edit post',
            'delete post',
            'read user',
            'update user',
            'delete user'
        ];


        $permission = collect($permissions)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' =>'web'];
        });

        Permission::insert($permission->toArray());
    }
}
