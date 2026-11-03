<?php

namespace Database\Seeders;

use App\Models\Leader;
use Illuminate\Database\Seeder;

class LeaderSeeder extends Seeder
{
    /**
     * Seed the application's leaders.
     */
    public function run(): void
    {
        $leaders = [
            [
                'name' => 'Adnan Maulana',
                'nim' => '210345003',
                'period_start' => 2012,
                'period_end' => 2013,
                'image' => null,
                'linkedin' => 'https://www.linkedin.com/in/adnan-maulana-07060486/',
            ],
            [
                'name' => 'Dimas Nugraha',
                'nim' => '211341007',
                'period_start' => 2013,
                'period_end' => 2014,
                'image' => 'assets-guest/img/img-leader-2013-2014.webp',
                'linkedin' => 'https://www.linkedin.com/in/ngrhadimas/',
            ],
            [
                'name' => 'Mohamed Iqbal',
                'nim' => '212341042',
                'period_start' => 2014,
                'period_end' => 2015,
                'image' => 'assets-guest/img/img-leader-2014-2015.webp',
                'linkedin' => 'https://www.linkedin.com',
            ],
            [
                'name' => 'Jefri Maulana',
                'nim' => '210345003',
                'period_start' => 2015,
                'period_end' => 2016,
                'image' => null,
                'linkedin' => 'https://www.linkedin.com',
            ],
            [
                'name' => 'Saptianhadi',
                'nim' => '214341047',
                'period_start' => 2016,
                'period_end' => 2017,
                'image' => 'assets-guest/img/img-leader-2016-2017.webp',
                'linkedin' => 'https://www.linkedin.com/in/saptian-hadi-175275129/',
            ],
            [
                'name' => 'Eko Rahayu Tali Jiwa',
                'nim' => '215341004',
                'period_start' => 2017,
                'period_end' => 2018,
                'image' => 'assets-guest/img/img-leader-2017-2018.webp',
                'linkedin' => 'https://www.linkedin.com/in/eko-rahayu-tali-jiwa/',
            ],
            [
                'name' => 'Sulthan M.F',
                'nim' => '216341069',
                'period_start' => 2018,
                'period_end' => 2019,
                'image' => 'assets-guest/img/img-leader-2018-2019.webp',
                'linkedin' => 'https://www.linkedin.com/in/sulthan-muhammad-firdaus-6a822a208/',
            ],
            [
                'name' => 'Riyadh Tsaniyadi D',
                'nim' => '217341068',
                'period_start' => 2019,
                'period_end' => 2020,
                'image' => 'assets-guest/img/img-leader-2019-2020.webp',
                'linkedin' => null,
            ],
            [
                'name' => 'Sendi Dika Prasenda',
                'nim' => '218441046',
                'period_start' => 2020,
                'period_end' => 2021,
                'image' => 'assets-guest/img/img-leader-2020-2021.webp',
                'linkedin' => 'https://www.linkedin.com/in/sendi-dika-prasenda-b64170203/',
            ],
            [
                'name' => 'Hery Ardiyanto',
                'nim' => '219441010',
                'period_start' => 2021,
                'period_end' => 2022,
                'image' => 'assets-guest/img/img-leader-2021-2022.webp',
                'linkedin' => 'https://www.linkedin.com/in/heryardiyanto/',
            ],
            [
                'name' => 'Yugi Prasetara',
                'nim' => '220441023',
                'period_start' => 2022,
                'period_end' => 2023,
                'image' => null,
                'linkedin' => 'https://www.linkedin.com/in/yugi-prasetara/',
            ],
            [
                'name' => 'Farhan Ali Madani',
                'nim' => '221441030',
                'period_start' => 2023,
                'period_end' => 2024,
                'image' => null,
                'linkedin' => 'https://www.linkedin.com/in/farhanalimadani/',
            ],
            [
                'name' => 'Rifqiaqil Mufahir E',
                'nim' => '222442020',
                'period_start' => 2024,
                'period_end' => 2025,
                'image' => 'assets-guest/img/img-leader-2024-2025.webp',
                'linkedin' => 'https://www.linkedin.com/in/rifqiaqil-mufahir-erwansyah-68a011248/',
            ],
            [
                'name' => 'Alwan Pramudia',
                'nim' => '223442076',
                'period_start' => 2025,
                'period_end' => 2026,
                'image' => 'assets-guest/img/img-leader-2025-2026.webp',
                'linkedin' => 'https://www.linkedin.com/in/alwan-pramudia-432b13293/',
            ],
            [
                'name' => 'Firman Rachmawan',
                'nim' => '224442079',
                'period_start' => 2026,
                'period_end' => 2027,
                'image' => 'assets-guest/img/img-leader-2026-2027.jpg',
                'linkedin' => 'https://www.linkedin.com/in/firman-rachmawan-471498319/',
            ],
        ];

        foreach ($leaders as $leader) {
            Leader::updateOrCreate(
                [
                    'period_start' => $leader['period_start'],
                    'period_end' => $leader['period_end'],
                ],
                array_merge($leader, [
                    'position' => 'KETUA HIMPUNAN',
                    'is_active' => true,
                ])
            );
        }
    }
}
