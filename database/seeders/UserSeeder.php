<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'name' => $faker->name,
            'email' => 'admin@barrocIntens.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => $faker->name,
            'email' => 'Customer@barrocIntens.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => $faker->name,
            'email' => 'Finance@barrocIntens.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => $faker->name,
            'email' => 'Maintenance@barrocIntens.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);
        User::create([
            'name' => $faker->name,
            'email' => 'Sales@barrocIntens.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
        ]);
        User::create([
            'name' => $faker->name,
            'email' => 'Sourcing@barrocIntens.com',
            'password' => Hash::make('password'),
            'role_id' => 5,
        ]);
        User::create([
            'name' => $faker->name,
            'email' => 'HeadOfMaintenance@barrocIntens.com',
            'password' => Hash::make('password'),
            'role_id' => 6,
        ]);
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role_id' => $faker->numberBetween(1, 6),
            ]);
        }
    }
}
