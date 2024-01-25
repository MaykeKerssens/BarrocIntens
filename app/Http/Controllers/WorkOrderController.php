<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Models\Product;
use App\Models\Appointment;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function index()
    {
        if(auth()->user()->role->name == "HeadOfMaintenance")
        {
            // Get all workOrders
            $workOrders = WorkOrder::paginate(10);
        } else {
            // Get all the workOrders belonging to the current user
            $workOrders = WorkOrder::whereHas('appointment', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->paginate(10);
        }

        return view('maintenance.workOrder.index', compact('workOrders'));
    }
    public function create()
    {
        $products = Product::all();
        $appointments = Appointment::all()->sortBy(function ($appointment) {
            return [$appointment->start, $appointment->company->name];
        });

        return view('maintenance.workOrder.create', compact('products', 'appointments'));
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

        return redirect(url('/maintenance'))->with('message', 'Werkbon successvol toegevoegd.');
    }
}
