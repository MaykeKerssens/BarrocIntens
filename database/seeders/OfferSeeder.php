<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offer1 = Offer::create([
            'date' => now(),
            'accept' => true,
            'costs' => 20,
            'company_id' => 1,  
        ]);

        $offer1->products()->attach([1, 2]);

        $offer2 = Offer::create([
            'date' => now()->subDays(5),
            'accept' => true,
            'costs' => 35,
            'company_id' => 2,
        ]);

        $offer2->products()->attach([3]);

        $offer3 = Offer::create([
            'date' => now()->subDays(10),
            'accept' => false,
            'costs' => 50,
            'company_id' => 3,
        ]);

        $offer3->products()->attach([1]);
    }
}
