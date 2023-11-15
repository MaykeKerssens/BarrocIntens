<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $guarded = [];
    public function ProductCategory()
{
    return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');

}
}

