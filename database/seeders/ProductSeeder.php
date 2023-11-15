<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Voorbeeldproduct',
            'description' => 'Dit is een voorbeeldproduct.',
            'image_path' => 'voorbeeld.jpg',
            'price' => 19.99,
            'product_category_id' => 1,
        ]);
    }
}
