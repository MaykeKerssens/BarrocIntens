<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('sourcing.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('sourcing.create', [
            'productCategories' => $productCategories,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $productCategories = ProductCategory::all();

        return view('sourcing.edit', [
            'product' => $product,
            'productCategories' => $productCategories,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'product_category_id' => 'required|exists:product_categories,id',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_category_id = $request->product_category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $product->image_path = 'storage/images/' . $imageName;
        }
        $product->save();

        return redirect()->route('sourcing.index')->with('message', 'Product is aangemaakt');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'product_category_id' => 'required|exists:product_categories,id',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_category_id = $request->product_category_id;

        $product->save();

        // Update image file
        if ($request->hasFile('image')) {

            // Check if there's an old image saved to storage
            if (isset($product->image_path)) {
                // Delete the old image from the 'public' disk
                Storage::disk('public')->delete(str_replace('storage/', '', $product->image_path));
            }

            // Save new image to public/storage/images
            $image = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $product->image_path = 'storage/images/' . $imageName;

            $product->save();
        }

        return redirect()->route('sourcing.index')->with('message', 'Product is bewerkt');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (!empty($product->image_path) && Storage::exists('public/' . $product->image_path)) {
            Storage::delete('public/' . $product->image_path);
        }

        $product->delete();

        return redirect()->route('sourcing.index')->with('message', 'Product is verwijderd');
    }
}
