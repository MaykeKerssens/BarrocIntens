<?php

namespace App\Models;

use App\Models\Product;
use App\Models\MaintenanceAppointment;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['name', 'description', 'maintenance_appointment_id', 'timeSpent'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_work_orders');
    }

    public function maintenanceAppointment()
    {
        return $this->belongsTo(MaintenanceAppointment::class);
    }
}
