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
            'image_path' => '/img/koffiezetapparaat1.jpg',
            'price' => 19.99,
            'product_category_id' => 1,
        ]);
        Product::create([
            'name' => 'Voorbeeldproduct 2',
            'description' => 'Dit is een voorbeeldproduct.',
            'image_path' => '/img/koffiezetapparaat2.jpg',
            'price' => 19.99,
            'product_category_id' => 1,
        ]);
        Product::create([
            'name' => 'Voorbeeldproduct 3',
            'description' => 'Dit is een voorbeeldproduct.',
            'image_path' => '/img/koffiezetapparaat3.jpg',
            'price' => 19.99,
            'product_category_id' => 1,
        ]);
        Product::create([
            'name' => 'Voorbeeldproduct 4',
            'description' => 'Dit is een voorbeeldproduct.',
            'image_path' => '/img/koffiezetapparaat4.jpg',
            'price' => 19.99,
            'product_category_id' => 1,
        ]);
    }
}
