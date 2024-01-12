<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\RepairRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $today = '2024-01-07';
        // $today = Carbon::now()->toDateString();
        $appointmentsToday = Appointment::has('repairRequests')
            ->with('repairRequests')
            ->where('user_id', auth()->user()->id)
            ->whereDate('start', $today)->get()
            ->sortBy('start');
        return view('maintenance.index', [
            'appointmentsToday' => $appointmentsToday,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function request()
    {
        $repairRequests = RepairRequest::paginate(10);
        return view('maintenance.requests', [
            'requests' => $repairRequests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
