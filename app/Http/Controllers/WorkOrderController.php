<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\Product;
use App\Models\Appointment;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function create()
    {
        $products = Product::all();
        $maintenanceAppointments = Appointment::all();

        return view('maintenance.workOrder.create', compact('products', 'maintenanceAppointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'appointment_id' => 'required|exists:appointments,id',
            'timeSpent' => 'required|numeric',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $workOrder = WorkOrder::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'appointment_id' => $request->input('appointment_id'),
            'timeSpent' => $request->input('timeSpent'),
        ]);

        $workOrder->products()->attach($request->input('products'));

        return redirect(url('/maintenance'))->with('success', 'Work Order created successfully.');
    }
}
