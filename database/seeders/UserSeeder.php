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
                "email" => "divisiinformasi2024@gmail.com",
                "email_verified_at" => "1995-07-17 10:23:34",
                "password" => bcrypt("divisiinformasi2024"),
                "role" => "admin",
            ],
            [
                "username" => "MO 2300811",
                "name" => "Diaz Adriansyah",
                "email" => "diazadr.dev@gmail.com",
                "email_verified_at" => now(),
                "password" => bcrypt("2300811"),
                "role" => "staff",
            ]
        ];

        DB::table('users')->insert($data);
    }
}
