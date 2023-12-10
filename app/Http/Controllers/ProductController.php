<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function welcome(Request $request)
    {
        $categories = ProductCategory::distinct()->get(['id', 'name']);
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('product_category_id', $request->category);
        }

        $products = $query->get();

        return view('welcome', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    // Other methods for product detail, creation, etc.

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Add other methods as needed
}
