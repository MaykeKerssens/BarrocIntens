<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('nl_NL');
        for ($i = 0; $i < 50; $i++) {
            $appointment = new \App\Models\Appointment();
            $appointment->user_id = $faker->numberBetween(3,4);
            $appointment->title = $faker->word;
            $appointment->note = $faker->sentence;
            $appointment->start = $faker->dateTimeThisMonth;
            $appointment->end = $faker->dateTimeBetween($appointment->start, $appointment->start->modify('+10 hours'));
            $appointment->save();
        }
    }
}
