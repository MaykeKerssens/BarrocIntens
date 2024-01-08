<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    use HasFactory;
    protected $table = 'offer_products';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
