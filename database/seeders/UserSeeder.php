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

        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),
            'role_id' => 1,
        ]);
        $adminUser = User::create([
            'name' => 'Customer',
            'email' => 'Customer@Customer.com',
            'password' => Hash::make('Customer'),
            'role_id' => 1,
        ]);
        $adminUser = User::create([
            'name' => 'Finance',
            'email' => 'Finance@Finance.com',
            'password' => Hash::make('Finance'),
            'role_id' => 1,
        ]);
        $adminUser = User::create([
            'name' => 'Maintenance',
            'email' => 'Maintenance@Maintenance.com',
            'password' => Hash::make('Maintenance'),
            'role_id' => 1,
        ]);
        $adminUser = User::create([
            'name' => 'Sales',
            'email' => 'Sales@Sales.com',
            'password' => Hash::make('Sales'),
            'role_id' => 1,
        ]);
        $adminUser = User::create([
            'name' => 'Sourcing',
            'email' => 'Sourcing@Sourcing.com',
            'password' => Hash::make('Sourcing'),
            'role_id' => 1,
        ]);
        $adminUser = User::create([
            'name' => 'HeadOfMaintenance',
            'email' => 'HeadOfMaintenance@HeadOfMaintenance.com',
            'password' => Hash::make('HeadOfMaintenance'),
            'role_id' => 1,
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

