<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\RepairRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $repairRequests = RepairRequest::where('company_id', auth()->user()->company->id )->paginate(10);
        $invoices = Invoice::whereHas('contract', function ($query) {
            $query->where('company_id', auth()->user()->company->id);
        })->paginate(10);
        
        return view('customer.index', [
            'repairRequests' => $repairRequests,
            'invoices' => $invoices,
        ]);
    }

    // Add other methods as needed
}
