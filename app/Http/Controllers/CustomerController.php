<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\RepairRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $repairRequests = RepairRequest::where('company_id', auth()->user()->company->id )->paginate(10);
        $contracts = Contract::where('company_id', auth()->user()->company->id )->paginate(10);
        return view('customer.index', [
            'repairRequests' => $repairRequests,
            'contracts' => $contracts,
        ]);
    }

    // Add other methods as needed
}
