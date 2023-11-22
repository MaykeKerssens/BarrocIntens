<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentRequest extends Model
{
    use HasFactory;

    public function repairRequest()
    {
        return $this->belongsTo(RepairRequest::class, 'repair_id');
    }

    public function maintenanceAppointment()
    {
        return $this->belongsTo(MaintenanceAppointment::class, 'appointment_id');
    }
}
