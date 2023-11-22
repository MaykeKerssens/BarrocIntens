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
            'name' => 'bedrijf1',
            'phone' => '1234567890',
            'street' => '123 Main Street',
            'city' => 'Breda',
            'bkr_checked_at' => now(),
            'user_id' => 1,      
        ]);

        Company::create([
            'name' => 'bedrijf5',
            'phone' => '1234567890',
            'street' => '123 Main Street',
            'city' => 'Breda',
            'user_id' => 1,      
        ]);
    }
}
