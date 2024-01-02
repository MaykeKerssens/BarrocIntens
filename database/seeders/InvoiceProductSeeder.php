<?php

namespace Database\Seeders;

use App\Models\InvoiceProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InvoiceProduct::create([
            'invoice_id' => 1,
            'product_id' => 1,
        ]);

        InvoiceProduct::create([
            'invoice_id' => 1,
            'product_id' => 2,
        ]);

        InvoiceProduct::create([
            'invoice_id' => 2,
            'product_id' => 3,
        ]);

        InvoiceProduct::create([
            'invoice_id' => 3,
            'product_id' => 1,
        ]);
    }
}
