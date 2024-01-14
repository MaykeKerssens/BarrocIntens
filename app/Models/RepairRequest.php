<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairRequest extends Model
{
    use HasFactory;

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_repair_requests', 'repair_request_id', 'appointment_id')
            ->withTimestamps();
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
