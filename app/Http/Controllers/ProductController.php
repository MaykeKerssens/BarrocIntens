<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
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
    public function index(Request $request)
    {
        $repairRequests = RepairRequest::with('status')
        ->whereHas('status', function ($query) {
            $query->where('name', 'bezig');
        })
        ->paginate(10);
        $query = Product::query();
    
        if ($request->filled('stockFilter')) {
            if ($request->stockFilter == 'in_stock') {
                $query->where('units_in_stock', '>', 0);
            } elseif ($request->stockFilter == 'out_of_stock') {
                $query->where('units_in_stock', '=', 0);
            }
        }
    
        $products = $query->paginate(10);
        return view('sourcing.index', [
            'products' => $products,
            'repairRequests' => $repairRequests,
        ]);
    }

    public function search(Request $request)
    {
        $repairRequests = RepairRequest::with('status')
        ->whereHas('status', function ($query) {
            $query->where('name', 'bezig');
        })
        ->paginate(10);    
        $query = Product::query();
    
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%$searchTerm%")
                  ->orWhere('description', 'like', "%$searchTerm%")
                  ->orWhere('image_path', 'like', "%$searchTerm%")
                  ->orWhere('price', 'like', "%$searchTerm%")
                  ->orWhere('product_category_id', 'like', "%$searchTerm%");
            });
        }
    
        $products = $query->paginate(10);
        return view('sourcing.index', [
            'products' => $products,
            'search' => $searchTerm ?? '',
            'repairRequests' => $repairRequests,
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'product_category_id' => 'required|exists:product_categories,id',
            'units_in_stock' => 'required|integer',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_category_id = $request->product_category_id;
        $product->units_in_stock = $request->units_in_stock;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $product->image_path = 'storage/images/' . $imageName;
        }

        $product->save();

        return redirect()->route('sourcing.index')->with('message', 'Product is aangemaakt');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'product_category_id' => 'exists:product_categories,id',
            'units_in_stock' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_category_id = $request->product_category_id;
        $product->units_in_stock = $request->units_in_stock;

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
        }

        $product->save();

        return redirect()->route('sourcing.index')->with('message', 'Product is succesvol bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->invoices->count() > 0 ) {
            return redirect()->route('sourcing.index')->with('message', 'Dit product kan niet verwijderd worden omdat het gekoppeld is aan een factuur.');
        }

        // Check if there are associated repair requests
        if ($product->repairRequests->count() > 0) {
            return redirect()->route('sourcing.index')->with('message', 'Dit product kan niet verwijderd worden omdat het gekoppeld is aan een reparatie aanvraag.');
        }

        // Delete product
        $product->delete();
        return redirect()->route('sourcing.index')->with('message', 'Product succesvol verwijderd.');
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
