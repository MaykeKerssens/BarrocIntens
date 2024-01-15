<?php

namespace Database\Seeders;

use App\Models\RepairRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepairRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('nl_NL');
        for ($i = 0; $i < 20; $i++) {
            $repairRequest = new \App\Models\RepairRequest();
            $repairRequest->product_id = $faker->numberBetween(1, 2);
            $repairRequest->company_id = $faker->numberBetween(1, 2);
            $repairRequest->status_id = $faker->numberBetween(1, 14);
            $repairRequest->description = $faker->sentence;
            $repairRequest->save();
        }
    }
}
