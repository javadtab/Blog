<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
        foreach( $permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
