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
    
        // Afbeelding uploaden en opslaan
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $product->image_path = 'images/' . $imageName;
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
    
        // Afbeelding uploaden en opslaan
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $product->image_path = 'images/' . $imageName;
        }
    
        $product->save();
    
        return redirect()->route('sourcing.index')->with('message', 'Product is bewerkt');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);


        //Checl of product besteld is
        // if ($product->orders()->exists()) {
        //     return redirect()->back()->with('error', 'Dit product kan niet worden verwijderd omdat het is besteld.');
        // }

        // Afbeelding verwijderen als die bestaat
        if (!empty($product->image_path) && Storage::exists($product->image_path)) {
            Storage::delete($product->image_path);
        }
    
        $product->delete();
        
        // Redirect naar de showblade
        $products = Product::all();
        return view('sourcing.index', [
            'products' => $products
        ])->with('message', 'Product is verwijderd');
        // return view('sourcing.index')->with('message', 'Product is verwijderd');
    }
}