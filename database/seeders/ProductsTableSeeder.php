<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Create categories
        $category1 = ProductCategory::create(['name' => 'Category 1']);
        $category2 = ProductCategory::create(['name' => 'Category 2']);
        $category3 = ProductCategory::create(['name' => 'Category 3']);

        // Create products
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'price' => 19.99, // Add a price value
            'image_path' => 'path/to/image1.jpg',
            'product_category_id' => $category1->id,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'price' => 29.99, // Add a price value
            'image_path' => 'path/to/image2.jpg',
            'product_category_id' => $category2->id,
        ]);

        // Add more products as needed
    }
}
