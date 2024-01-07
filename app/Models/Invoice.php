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

    public function InvoiceProducts()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

}
