<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class EkrafUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'ekraf@himamo.com')->first();

        if (! $user) {
            throw new RuntimeException(
                'Buat akun ekraf@himamo.com terlebih dahulu, lalu jalankan seeder EkrafUserSeeder kembali.'
            );
        }

        $user->update(['role' => 'ekraf']);
    }
}
