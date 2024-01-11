<?php

// WorkOrderController.php
namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\Product;
use App\Models\MaintenanceAppointment;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function create()
    {
        $products = Product::all(); // Assuming you have a Product model
        $maintenanceAppointments = MaintenanceAppointment::all();

        return view('maintenance.workOrder.create', compact('products', 'maintenanceAppointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'maintenance_appointment_id' => 'required|exists:maintenanceAppointments,id',
            'timeSpent' => 'required|numeric',
            'products' => 'array', // Assuming you are submitting an array of product IDs
        ]);

        $workOrder = WorkOrder::create($request->only('name', 'description', 'maintenanceApointment_id', 'timeSpent'));

        if ($request->has('products')) {
            $workOrder->products()->attach($request->input('products'));
        }

        // Additional logic as needed

        return redirect()->route('workOrders.index')->with('success', 'WorkOrder created successfully!');
    }
}
