<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = ['name', 'description', 'appointment_id', 'timeSpent'];   

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_work_orders');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
