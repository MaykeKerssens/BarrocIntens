<?php

namespace App\Http\Controllers;

use App\Models\RepairRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $requests = RepairRequest::paginate(10);
        return view('customer.index', [
            'requests' => $requests,
        ]);
    }

    // Add other methods as needed
}
