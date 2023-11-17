<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\InvoicesController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            Companyseeder::class,
            ContractSeeder::class,
            InvoiceSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            RepairRequestSeeder::class,
            MaintenanceAppointmentSeeder::class,
            AppointmentRequestSeeder::class,
        ]);
    }
}
