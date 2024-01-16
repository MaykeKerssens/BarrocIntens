<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Company;
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

        // Get all companies
        $companies = Company::all();
        // Only show repairRequests that are not finished or canceled
        $repairRequests = RepairRequest::all();
        $newRepairRequests = $repairRequests->where('status.name', 'Nieuw');

        return view('maintenance.appointment.create', [
            'maintenanceWorkers' => $maintenanceWorkers,
            'companies' => $companies,
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
            'repairRequests' => 'required|array',
            'company' => 'required|exists:companies,id'
        ]);

        // Check if there is a repairRequest with value 0
        if (in_array(0, $request->input('repairRequests', []))) {
            // Don't attach any repair requests to the appointment
        } else {
            $request->validate([
                'repairRequests.*' => [
                    'exists:repair_requests,id',
                    function ($attribute, $value, $fail) use ($request) {
                        // Check if all repairRequests have the same company_id
                        $company_id = RepairRequest::whereIn('id', $request->input('repairRequests'))->pluck('company_id')->first();

                        if ($company_id && RepairRequest::where('company_id', '!=', $company_id)->whereIn('id', $request->input('repairRequests'))->exists()) {
                            $fail('Alle geselecteerde storingsaanvragen moeten van hetzelfde bedrijf afkomstig zijn');
                        }
                    },
                    function ($attribute, $value, $fail) use ($request) {
                        // Check if repairRequest company_id is the same as $request->company
                        $company_id = $request->company;
                        $repairRequestCompanyIds = RepairRequest::whereIn('id', $request->input('repairRequests'))->pluck('company_id')->toArray();

                        if (count(array_unique($repairRequestCompanyIds)) > 1 || reset($repairRequestCompanyIds) != $company_id) {
                            $fail('De geselecteerde storinsaanvragen moeten bij het gekozen bedrijf horen');
                        }
                    },
                ],
            ]);
        }

        $appointment = Appointment::create([
            'title' => $request->title,
            'note' => $request->note,
            'start' => $request->start,
            'end' => $request->end,
            'user_id' => $request->maintenanceWorker,
            'company_id' => $request->company,
        ]);

        // Update status to 'Ingepland' for all selected repairRequests
        if (!in_array(0, $request->input('repairRequests', []))) {
            RepairRequest::whereIn('id', $request->input('repairRequests'))->update(['status_id' => 2]);

            // Add related repair requests to the appointment
            $appointment->repairRequests()->attach($request->input('repairRequests', []));
        }

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
        // Get all needed data
        $maintenanceWorkers = User::where('role_id', 3)->get();
        $companies = Company::all();
        $repairRequests = RepairRequest::all();

        $appointment = Appointment::find($id);
        return view('maintenance.appointment.edit', [
            'appointment' => $appointment,
            'repairRequests' => $repairRequests,
            'maintenanceWorkers' => $maintenanceWorkers,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'title' => 'required|string',
            'note' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'maintenanceWorker' => 'required|exists:users,id',
            'repairRequests' => 'required|array',
            'company' => 'required|exists:companies,id'
        ]);

        // Additional validation logic for repairRequests can be added if needed

        $appointment->update([
            'title' => $request->title,
            'note' => $request->note,
            'start' => $request->start,
            'end' => $request->end,
            'user_id' => $request->maintenanceWorker,
            'company_id' => $request->company,
        ]);

        // Update status to 'Ingepland' for all selected repairRequests
        $appointment->repairRequests()->detach(); // Clear existing relationships
        if (!in_array(0, $request->input('repairRequests', []))) {
            RepairRequest::whereIn('id', $request->input('repairRequests'))->update(['status_id' => 2]);

            // Add related repair requests to the appointment
            $appointment->repairRequests()->attach($request->input('repairRequests', []));
        }

        return redirect()->route('headOfMaintenance.request')->with('message', "Afspraak '" . $appointment->title . "' is succesvol bijgewerkt.");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
