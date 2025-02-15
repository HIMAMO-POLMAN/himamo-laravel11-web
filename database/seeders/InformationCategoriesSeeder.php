<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class InformationCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Lomba",
                "slug" => "lomba",
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                "name" => "Beasiswa",
                "slug" => "beasiswa",
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                "name" => "Berita",
                "slug" => "berita",
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                "name" => "Pengumuman",
                "slug" => "pengumuman",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('information_categories')->insert($data);
    }
}
