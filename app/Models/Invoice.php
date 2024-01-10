<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime: d/m/Y H:i',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_products', 'invoice_id', 'product_id')
            ->withTimestamps();
    }

}
