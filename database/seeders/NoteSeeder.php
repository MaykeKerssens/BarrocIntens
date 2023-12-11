<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Note::create([
            'note' => 'Initial meeting regarding coffee machine requirements.',
            'date' => now()->subDays(5),
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Note::create([
            'note' => 'Received updated price quotes for the coffee machines.',
            'date' => now()->subDays(2),
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Note::create([
            'note' => 'Scheduled demonstration of the latest coffee machines.',
            'date' => now(),
            'company_id' => 1,
            'user_id' => 1,
        ]);
    }
}
