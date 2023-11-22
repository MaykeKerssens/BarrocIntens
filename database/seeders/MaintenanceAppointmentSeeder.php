<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenanceAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('nl_NL');
        for ($i = 0; $i < 5; $i++) {
            $maintenanceAppointment = new \App\Models\MaintenanceAppointment();
            $maintenanceAppointment->user_id = $faker->numberBetween(1,1);
            $maintenanceAppointment->note = $faker->sentence;
            $maintenanceAppointment->save();
        }
    }
}
