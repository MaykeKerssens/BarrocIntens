<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Customer'],
            ['id' => 2, 'name' => 'Finance'],
            ['id' => 3, 'name' => 'Maintenance'],
            ['id' => 4, 'name' => 'Sales'],
            ['id' => 5, 'name' => 'Sourcing'],
            ['id' => 6, 'name' => 'HeadOfMaintenance'],
            ['id' => 7, 'name' => 'Admin'], // Add the 'admin' role
        ]);
    }
}
