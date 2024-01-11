<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['name', 'description', 'maintenanceApointment_id', 'timeSpent'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function maintenanceAppointment()
    {
        return $this->belongsTo(MaintenanceAppointment::class);
    }
}

