<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairRequest extends Model
{
    use HasFactory;

    public function appointmentRequests()
    {
        return $this->hasMany(AppointmentRequest::class);
    }
}
