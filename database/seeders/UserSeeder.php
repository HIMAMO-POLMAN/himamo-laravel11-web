<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "username" => "Divisi Informasi",
            "name" => "HIMAMO",
            "email" => "informasihimamo@gmail.com",
            "email_verified_at" => "1995-07-17 10:23:34",
            "password" => bcrypt("informasiMO24"),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Pastikan role sudah ada dari RolePermissionSeeder
        $user->assignRole('admin');
    }
}
