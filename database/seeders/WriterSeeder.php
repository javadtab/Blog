<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $writer = User::query()->create([
            "name" => 'writer',
            "ip" => '93.119.213.121',
            "email" => 'writer@gmail.com',
            "phonenumber" => '05681871489',
            "password" => bcrypt('password')
        ]);

        Permission::query()->pluck('name')->toArray();

        $writer->givePermissionTo(['create post','read post','edit post']);
        $writer->assignRole('writer');

    }
}
