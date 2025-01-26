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
                "slug" => "lomba"
            ],
            [
                "name" => "Beasiswa",
                "slug" => "beasiswa"
            ],
            [
                "name" => "Berita",
                "slug" => "berita"
            ],
            [
                "name" => "Pengumuman",
                "slug" => "pengumuman"
            ]
        ];

        // Masukkan data ke dalam tabel
        DB::table('information_categories')->insert($data);
    }
}
