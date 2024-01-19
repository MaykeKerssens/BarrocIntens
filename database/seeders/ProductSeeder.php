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
            'name' => 'Barroc Intens Italian Light',
            'description' => 'Een koffiezetapparaat voor dagelijks gebruik.',
            'image_path' => 'storage/images/machine-bit-light.png',
            'price' => 499,
            'product_category_id' => 1,
            'units_in_stock' => 50, // Set an initial value for units in stock
        ]);
        Product::create([
            'name' => 'Barroc Intens Italian',
            'description' => 'Een krachtige koffiezetapparaat.',
            'price' => 599,
            'product_category_id' => 2,
            'units_in_stock' => 30, // Set an initial value for units in stock
        ]);
        Product::create([
            'name' => 'Barroc Intens Italian Deluxe',
            'description' => 'Een koffiezetapparaat voor dagelijks gebruik.',
            'image_path' => 'storage/images/machine-bit-deluxe.png',
            'price' => 799,
            'product_category_id' => 3,
            'units_in_stock' => 20, // Set an initial value for units in stock
        ]);
        // ... (repeat for other products)

        Product::create([
            'name' => 'Red Honey Honduras',
            'description' => 'De koffie is geproduceerd volgens de honey-methode. Hierbij wordt de koffieboon in haar vruchtvlees gedroogd, waardoor de zoete fruitsmaak diep in de boon trekt. Dit levert een éxtra zoete koffie op.',
            'price' => 27.80,
            'product_category_id' => 5,
            'units_in_stock' => 15, // Set an initial value for units in stock
        ]);
    }
}
