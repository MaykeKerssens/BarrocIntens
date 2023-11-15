<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceAppointment extends Model
{
    use HasFactory;

    public function appointmentRequest()
    {
        return $this->hasMany(AppointmentRequest::class);
    }
}
