<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\Product;
use App\Models\MaintenanceAppointment;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function create()
    {
        $products = Product::all();
        $maintenanceAppointments = MaintenanceAppointment::all();

        return view('maintenance.workOrder.create', compact('products', 'maintenanceAppointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'maintenance_appointment_id' => 'required|exists:maintenance_appointments,id',
            'timeSpent' => 'required|numeric',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $workOrder = WorkOrder::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'maintenance_appointment_id' => $request->input('maintenance_appointment_id'),
            'timeSpent' => $request->input('timeSpent'),
        ]);

        $workOrder->products()->attach($request->input('products'));

        return redirect(url('/maintenance'))->with('success', 'Work Order created successfully.');
    }
}
