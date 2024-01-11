<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_products', 'product_id', 'invoice_id')
            ->withTimestamps();
    }

    public function repairRequests()
    {
        return $this->hasMany(RepairRequest::class);
    }
}