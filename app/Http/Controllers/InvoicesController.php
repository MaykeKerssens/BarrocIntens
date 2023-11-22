<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contract;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();
        $invoices = Invoice::all();
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
        return view('invoices.create', ['contracts' => $contracts]);
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

        Invoice::create([
            'date' => $request->date,
            'paid' => $request->has('paid') ? $request->paid : 0,
            'costs' => $request->costs,
            'contract_id' => $request->contract_id,
        ]);

        return redirect()->route('finance.index')->with('success', 'Factuur is succesvol aangemaakt.');
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
        $invoice = Invoice::find($id);
        return view('invoices.edit')->with('invoice', $invoice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'paid' => $request->boolean('paid'),
        ]);
    
        return redirect()->route('finance.index')->with('success', 'Factuur is succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
