<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentRepairRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            // Get random appointment and repair request
            $appointment = \App\Models\Appointment::inRandomOrder()->first();
            $repairRequest = \App\Models\RepairRequest::inRandomOrder()->first();

            // Attach the repair request to the appointment
            $appointment->repairRequests()->attach($repairRequest);
        }
    }
}
