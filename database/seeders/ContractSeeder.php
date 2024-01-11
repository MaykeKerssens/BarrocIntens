<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contract::create([
                'company_id' => 1,
                'start_date' => '2023-01-01',
                'end_date' => '2024-03-14',
                'is_signed' => true,
                'billing_type' => 'maandelijks',
        ]);

            Contract::create([
                'company_id' => 2,
                'start_date' => '2023-01-05',
                'end_date' => '2024-07-31',
                'is_signed' => true,
                'billing_type' => 'periodiek',
        ]);
    }
}
