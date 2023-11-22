<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('nl_NL');
        for ($i = 0; $i < 5; $i++) {
            $appointmentRequest = new \App\Models\AppointmentRequest();
            $appointmentRequest->appointment_id = $faker->numberBetween(1,5);
            $appointmentRequest->request_id = $faker->numberBetween(1,5);
            $appointmentRequest->save();
        }
    }
}
