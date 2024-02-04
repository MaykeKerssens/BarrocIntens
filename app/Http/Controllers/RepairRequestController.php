<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\RepairRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairRequestController extends Controller
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
        $products = Product::all();
        return view('repairRequests.create', ['companies' => $companies, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'product_id' => 'required|exists:products,id',
            'description' => 'required|string',
        ]);

        $statusId = Status::where('name', 'Nieuw')->value('id');

        if ($request->has('emergency') && $request->input('emergency')) {
            $statusId = Status::where('name', 'Noodgeval')->value('id');
        }

        RepairRequest::create([
            'company_id' => $request->company_id,
            'product_id' => $request->product_id,
            'description' => $request->description,
            'status_id' => $statusId,
        ]);

        if(auth()->user()->role->name == 'Customer'){
            return redirect()->route('customer.index')->with('message', 'Storing succesvol toegevoegd.');
        }
        elseif(auth()->user()->role->name == 'HeadOfMaintenance') {
            return redirect()->route('headOfMaintenance.request')->with('message', 'Storing succesvol toegevoegd.');
        }

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
        $repairRequest = RepairRequest::findOrFail($id);
        $companies = Company::all();
        $products = Product::all();
        $statuses = Status::all();

        return view('repairRequests.edit', [
            'repairRequest' => $repairRequest,
            'companies' => $companies,
            'products' => $products,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'product_id' => 'required|exists:products,id',
            'description' => 'required|string',
            'status_id' => 'required|exists:statuses,id'
        ]);

        RepairRequest::create([
            'company_id' => $request->company_id,
            'product_id' => $request->product_id,
            'description' => $request->description,
            'status_id' => $request->status_id,
        ]);
        $repairRequest = RepairRequest::findOrFail($id);

        $repairRequest->company_id = $request->company_id;
        $repairRequest->product_id = $request->product_id;
        $repairRequest->description = $request->description;
        $repairRequest->status_id = $request->status_id;

        $repairRequest->save();

        return redirect()->route('headOfMaintenance.request')->with('message', 'Storing succesvol aangepast.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $repairRequest = RepairRequest::findOrFail($id);

        // Check if there are associated appointments
        if ($repairRequest->appointments->count() > 0) {
            return redirect()->route('headOfMaintenance.request')->with('message', 'Deze reparatie aanvraag kan niet verwijderd worden omdat het gekoppeld is aan een reparatie afspraak.');
        }

        // Delete product
        $repairRequest->delete();
        return redirect()->route('headOfMaintenance.request')->with('message', 'Reparatie aanvraag succesvol verwijderd.');
    }
}
