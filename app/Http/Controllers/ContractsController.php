<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('contracts.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'billing_type' => 'required|in:maandelijks,periodiek',
        ]);

        $isSigned = $request->has('is_sign') ? 1 : 0;

        Contract::create([
            'company_id' => $request->company_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_sign' => $isSigned,
            'billing_type' => $request->billing_type,
        ]);

        return redirect()->route('finance.index')->with('success', 'contract is succesvol aangemaakt.');
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
        $contract = Contract::findOrFail($id);
        $companies = Company::all();
        return view('contracts.edit')->with(['contract' => $contract, 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'bkr_checked_at' => 'nullable|date',
            'billing_type' => 'required|in:maandelijks,periodiek',
        ]);

        $contract = Contract::findOrFail($id);

        $contract->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_sign' => $request->boolean('is_sign'),
            'billing_type' => $request->billing_type,
        ]);

        $company = $contract->company;

        if ($company) {
            $company->update([
                'bkr_checked_at' => $request->input('bkr_checked_at'),
            ]);
        }

        return redirect()->route('finance.index')->with('success', 'Contract is succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);

        if ($contract->invoices->count() > 0) {
            return redirect()->route('finance.index')->with('message', 'Dit contract kan niet verwijderd worden omdat het gekoppeld is aan een of meerdere facturen.');
        } 
        else {
            // Delete contract
            $contract->delete();
            return redirect()->route('finance.index')->with('succes', 'Contract succesvol verwijderd');
        }
    }
}
