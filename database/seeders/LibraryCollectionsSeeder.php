<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LibraryCollectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Teori",
                "slug" => "teori",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "TRO",
                "slug" => "tro",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "TRMO",
                "slug" => "trmo",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "TRIN",
                "slug" => "trin",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "name" => "TRSA",
                "slug" => "trsa",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('library_collections')->insert($data);
    }
}
