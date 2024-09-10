<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            permissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            WriterSeeder::class,
        ]);
    }

}
