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
            'maintenance_appointment_id' => 'required|exists:maintenance_appointments,id',
            'timeSpent' => 'required|numeric',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        // Create a new work order
        $workOrder = WorkOrder::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'maintenance_appointment_id' => $request->input('maintenance_appointment_id'),
            'timeSpent' => $request->input('timeSpent'),
        ]);

        // Attach products to the work order
        $workOrder->products()->attach($request->input('products'));

        return redirect()->route('workOrder.create')->with('success', 'Work Order created successfully.');
    }
}
