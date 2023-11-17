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
        // RepairRequest::create([
        //     'product_id' => 1,
        //     'company_id' => 1,
        //     'note' => 'fsfafa',
        //     'status' => 'Ingepland',
        // ]);

        $faker = \Faker\Factory::create('nl_NL');
        for ($i = 0; $i < 5; $i++) {
            $repairRequest = new \App\Models\RepairRequest();
            $repairRequest->product_id = $faker->numberBetween(1, 2);
            $repairRequest->company_id = $faker->numberBetween(1, 2);
            $repairRequest->note = $faker->sentence;
            $repairRequest->status = 'In afwachting';
            $repairRequest->save();
        }
    }
}
