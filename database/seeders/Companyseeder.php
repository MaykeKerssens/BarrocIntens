<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Companyseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();
        Company::create([
            'name' => 'Barroc Intens',
            'phone' => '+31(0)76-5733444',
            'street' => 'Terheijdenseweg 350',
            'city' => 'Breda',
            'zip' => '4826 AA',
            'bkr_checked_at' => now(),
            'user_id' => 1,
        ]);

        for ($i = 0; $i < 10; $i++) {
            Company::create([
                'name' => $faker->company,
                'phone' => $faker->phoneNumber,
                'street' => $faker->streetName . ' ' . $faker->buildingNumber ,
                'city' => $faker->city,
                'zip' => $faker->postcode,
                'bkr_checked_at' => now(),
                'user_id' => $faker->numberBetween(17, 26),
            ]);
        }

        Company::create([
            'name' => 'Admin Company',
            'phone' => '+31(0)76-5733444',
            'street' => 'Admin Street',
            'city' => 'Admin City',
            'zip' => '12345',
            'bkr_checked_at' => now(),
            'user_id' => 27, // Assuming the admin user is the 27th user created
        ]);
    }
}
