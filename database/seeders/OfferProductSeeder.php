<?php

namespace Database\Seeders;

use App\Models\OfferProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OfferProduct::create([
            'offer_id' => 1,
            'product_id' => 1,
        ]);

        OfferProduct::create([
            'offer_id' => 1,
            'product_id' => 2,
        ]);

        OfferProduct::create([
            'offer_id' => 2,
            'product_id' => 3,
        ]);

        OfferProduct::create([
            'offer_id' => 3,
            'product_id' => 1,
        ]);
    }
}
