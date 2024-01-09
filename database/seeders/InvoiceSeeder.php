<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Invoice::create([
                'date' => now(),
                'is_paid' => true,
                'costs' => 20,
                'contract_id' => 1,
            ]);
            Invoice::create([
                'date' => now()->subDays(5),
                'is_paid' => false,
                'costs' => 35,
                'contract_id' => 2,
            ]);

            Invoice::create([
                'date' => now()->subDays(10),
                'is_paid' => true,
                'costs' => 50,
                'contract_id' => 1,
            ]);
    }
}
