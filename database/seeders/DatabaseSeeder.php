<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            Companyseeder::class,
            ContractSeeder::class,
            InvoiceSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            statusSeeder::class,
            RepairRequestSeeder::class,
            MaintenanceAppointmentSeeder::class,
            AppointmentRequestSeeder::class,
            NoteSeeder::class,
            OfferSeeder::class,
            OfferProductSeeder::class,
        ]);
    }
}
