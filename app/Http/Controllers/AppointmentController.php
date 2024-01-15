<?php

namespace App\Http\Controllers;

use App\Models\RepairRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
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
        $maintenanceWorkers = User::where('role_id', 3)->get();


        $repairRequests = RepairRequest::all();

        // Only show repairRequests that are not finished or canceled
        $newRepairRequests = $repairRequests->where('status.name', 'Nieuw');

        return view('maintenance.appointment.create', [
            'maintenanceWorkers' => $maintenanceWorkers,
            'newRepairRequests' => $newRepairRequests,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}