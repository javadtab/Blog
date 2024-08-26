<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::query()->create([
            "name" => 'admin',
            "ip" => '93.119.213.121',
            "email" => 'admin@gmail.com',
            "phonenumber" => '05681871489',
            "password" => bcrypt('password')
        ]);

        $user->assignRole('admin');

    }

}
