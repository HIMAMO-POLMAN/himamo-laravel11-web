<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "username" => "Divisi Informasi",
                "name" => "HIMAMO",
                "email" => "informasihimamo@gmail.com",
                "email_verified_at" => "1995-07-17 10:23:34",
                "password" => bcrypt("informasiMO24"),
                "role" => "admin",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
