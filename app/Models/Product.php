<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function ProductCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function InvoiceProducts()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

    public function RepairRequests()
    {
        return $this->hasMany(RepairRequest::class);
    }
}
