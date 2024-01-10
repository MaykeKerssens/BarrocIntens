<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offers';

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function OfferProducts()
    {
        return $this->hasMany(OfferProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'offer_products', 'offer_id', 'product_id')
            ->withTimestamps();
    }
}
