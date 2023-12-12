<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Companyseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'De Bijenkorf',
            'phone' => '0761234567',
            'street' => 'Coolsingel 105, 3012 AG',
            'city' => 'Rotterdam',
            'bkr_checked_at' => now(),
            'user_id' => 1,
        ]);

        Company::create([
            'name' => 'Albert Heijn',
            'phone' => '0769876543',
            'street' => 'Moerwijk 2, 4826 HN',
            'city' => 'Breda',
            'bkr_checked_at' => now(),
            'user_id' => 2,
        ]);

        Company::create([
            'name' => 'IKEA',
            'phone' => '0765556666',
            'street' => 'Kruisweide 1, 4814 RW',
            'city' => 'Breda',
            'user_id' => 3,
        ]);
    }
}
