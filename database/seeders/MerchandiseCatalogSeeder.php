<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchandiseCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Stiker Warning Automation Engineering',
                'slug' => 'stiker-warning-automation-engineering',
                'sku' => 'HM-STK-01',
                'description' => 'Stiker peringatan dengan identitas Automation Engineering.',
                'category' => 'Automation Engineering',
                'image_path' => 'assets/katalog_assets/stiker1.jpeg',
                'price' => 5000,
                'stock' => 50,
                'variants' => [],
            ],
            [
                'name' => 'Stiker Logo Automation Engineering',
                'slug' => 'stiker-logo-automation-engineering',
                'sku' => 'HM-STK-02',
                'description' => 'Stiker logo Automation Engineering untuk laptop dan perlengkapan harian.',
                'category' => 'Automation Engineering',
                'image_path' => 'assets/katalog_assets/stiker2.jpeg',
                'price' => 7500,
                'stock' => 40,
                'variants' => [],
            ],
            [
                'name' => 'Stiker Input Process Output',
                'slug' => 'stiker-input-process-output',
                'sku' => 'HM-STK-03',
                'description' => 'Stiker bertema input, process, dan output.',
                'category' => 'Automation Engineering',
                'image_path' => 'assets/katalog_assets/stiker3.jpeg',
                'price' => 7500,
                'stock' => 40,
                'variants' => [],
            ],
            [
                'name' => 'Stiker Error Sleep Not Found',
                'slug' => 'stiker-error-sleep-not-found',
                'sku' => 'HM-STK-04',
                'description' => 'Stiker humor untuk penggemar otomasi dan teknologi.',
                'category' => 'Automation Engineering',
                'image_path' => 'assets/katalog_assets/stiker4.jpeg',
                'price' => 7500,
                'stock' => 40,
                'variants' => [],
            ],
            [
                'name' => 'Lanyard Automation Engineering',
                'slug' => 'lanyard-automation-engineering',
                'sku' => 'HM-LNY-01',
                'description' => 'Lanyard dengan identitas Automation Engineering.',
                'category' => 'Automation Engineering',
                'image_path' => 'assets/katalog_assets/lanyard.jpeg',
                'price' => 25000,
                'stock' => null,
                'variants' => [
                    ['name' => 'Hitam', 'stock' => 15],
                    ['name' => 'Teal', 'stock' => 15],
                ],
            ],
            [
                'name' => 'Gelang HIMAMO',
                'slug' => 'gelang-himamo',
                'sku' => 'HM-GLG-01',
                'description' => 'Gelang merchandise dengan identitas HIMAMO.',
                'category' => 'HIMAMO',
                'image_path' => 'assets/katalog_assets/gelang.jpeg',
                'price' => 15000,
                'stock' => null,
                'variants' => [
                    ['name' => 'Ukuran S/M', 'stock' => 20],
                    ['name' => 'Ukuran L/XL', 'stock' => 20],
                ],
            ],
            [
                'name' => 'Gantungan Kunci HIMAMO',
                'slug' => 'gantungan-kunci-himamo',
                'sku' => 'HM-GK-01',
                'description' => 'Gantungan kunci dengan desain HIMAMO.',
                'category' => 'HIMAMO',
                'image_path' => 'assets/katalog_assets/gantungan_kunci.jpeg',
                'price' => 20000,
                'stock' => 30,
                'variants' => [],
            ],
            [
                'name' => 'Enamel HIMAMO',
                'slug' => 'enamel-himamo',
                'sku' => 'HM-ENM-01',
                'description' => 'Enamel pin dengan identitas HIMAMO.',
                'category' => 'HIMAMO',
                'image_path' => 'assets/katalog_assets/enamel.jpeg',
                'price' => 20000,
                'stock' => 30,
                'variants' => [],
            ],
        ];

        DB::transaction(function () use ($products) {
            foreach ($products as $data) {
                $variants = $data['variants'];
                unset($data['variants']);

                $product = Product::firstOrCreate(
                    ['slug' => $data['slug']],
                    [...$data, 'is_active' => true],
                );

                if ($variants !== [] && ! $product->variants()->exists()) {
                    $product->variants()->createMany($variants);
                }
            }
        });
    }
}
