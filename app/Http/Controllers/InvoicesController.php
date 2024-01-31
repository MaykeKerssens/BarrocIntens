<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::paginate(10);
        $invoices = Invoice::with('products')->paginate(10);
        return view('finance.index',[
            'invoices' => $invoices,
            'contracts' => $contracts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contracts = Contract::all();
        $products = Product::all(); // Haal alle beschikbare producten op
        return view('invoices.create', ['contracts' => $contracts, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'costs' => 'required|numeric',
            'contract_id' => 'required|exists:contracts,id',
        ]);

        $invoice = Invoice::create([
            'date' => $request->date,
            'is_paid' => $request->has('is_paid') ? $request->is_paid : 0,
            'costs' => $request->costs,
            'contract_id' => $request->contract_id,
        ]);

       // Voeg producten toe aan de factuur
       $invoice->products()->attach($request->input('product_ids', []));

       foreach ($request->input('product_ids') as $product_id) {
            $product = Product::find($product_id);
            $product->update(['units_in_stock' => $product->units_in_stock - 1]);
        }

        return redirect()->route('finance.index')->with('message', 'Factuur is succesvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contracts = Contract::all();
        $invoice = Invoice::find($id);
        return view('invoices.edit')->with('invoice', $invoice, 'contracts', $contracts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'is_paid' => $request->boolean('is_paid'),
        ]);

        return redirect()->route('finance.index')->with('message', 'Factuur is succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
