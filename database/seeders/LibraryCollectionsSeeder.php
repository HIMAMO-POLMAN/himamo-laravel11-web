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
            ],
            [
                "name" => "TRO",
                "slug" => "tro",
            ],
            [
                "name" => "TRMO",
                "slug" => "trmo",
            ],
            [
                "name" => "TRIN",
                "slug" => "trin",
            ],
            [
                "name" => "TRSA",
                "slug" => "trsa",
            ]
        ];

        DB::table('library_collections')->insert($data);
    }
}
