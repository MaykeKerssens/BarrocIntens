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
            'note' => 'Lorem ipsum dolor sit amet, consectetur adipiscing.',
            'date' => now(),
            'company_id' => 1,
            'user_id' => 1,
        ]);
    }
}
