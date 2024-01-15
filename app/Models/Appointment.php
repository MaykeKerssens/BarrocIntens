<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $casts = [
        'start' => 'datetime:d-m-Y',
        'end' => 'datetime:d-m-Y',
    ];

    protected $fillable = [
        'title',
        'note',
        'start',
        'end',
        'user_id',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function repairRequests()
    {
        return $this->belongsToMany(RepairRequest::class, 'appointment_repair_requests', 'appointment_id', 'repair_request_id')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
