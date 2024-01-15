<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\RepairRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        // Get all maintenance workers
        $maintenanceWorkers = User::where('role_id', 3)->get();

        // Only show repairRequests that are not finished or canceled
        $repairRequests = RepairRequest::all();
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
        $request->validate([
            'title' => 'required|string',
            'note' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'maintenanceWorker' => 'required|exists:users,id',
            'repairRequests' => 'required|array|min:1|exists:repair_requests,id',

            'repairRequests.*' => [
                'exists:repair_requests,id',
                function ($attribute, $value, $fail) use ($request) {
                    // Check if all repairRequests have the same company_id
                    $company_id = RepairRequest::whereIn('id', $request->input('repairRequests'))->pluck('company_id')->first();

                    if ($company_id && RepairRequest::where('company_id', '!=', $company_id)->whereIn('id', $request->input('repairRequests'))->exists()) {
                        $fail('All selected repairRequests must have the same company_id.');
                    }
                },
            ],
        ]);

        // Get the company_id from one of the repairRequests
        $company_id = RepairRequest::whereIn('id', $request->input('repairRequests'))->pluck('company_id')->first();

        $appointment = Appointment::create([
            'title' => $request->title,
            'note' => $request->note,
            'start' => $request->start,
            'end' => $request->end,
            'user_id' => $request->maintenanceWorker,
            'company_id' => $company_id,
        ]);

        // Add related repair requests to the appointment
        $appointment->repairRequests()->attach($request->input('repairRequests', []));

        return redirect()->route('headOfMaintenance.request')->with('message', "Afspraak  '" . $appointment->title . "' is succesvol aangemaakt." );
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
