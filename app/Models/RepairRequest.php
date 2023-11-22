<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RepairRequest extends Model
{
    use HasFactory;

    public function appointmentRequests(): HasMany
    {
        return $this->hasMany(AppointmentRequest::class, 'request_id');
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
