<?php

namespace App\Http\Controllers;

use App\Models\InvoiceProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\RepairRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
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
  
     public function show(Product $product)
    {
        return view('products.show', compact('product'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            // Fix when changing product category table!
            // 'product_category_id' => 'nullable|exists:product_categories,id|required_if:product_category_id,null',
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
            // Fix when changing product category table!
            // 'product_category_id' => 'exists:product_categories,id',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_category_id = $request->product_category_id;

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

        return redirect()->route('sourcing.index')->with('message', 'Product is succesvol bewerkt');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Check if product is allowed to be deleted
        if ($product->InvoiceProducts->count() > 0) {
            return redirect()->route('sourcing.index')->with('message', 'Dit product kan niet verwijderd worden omdat het gekoppeld is aan een factuur.');
        }
        elseif ($product->RepairRequests->count() > 0) {
            return redirect()->route('sourcing.index')->with('message', 'Dit product kan niet verwijderd worden omdat het gekoppeld is aan een reparatie aanvraag.');
        } else {
            // Delete product
            $product->delete();
            return redirect()->route('sourcing.index')->with('message', 'Product succesvol verwijderd.');
        }
    }
  
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
}
