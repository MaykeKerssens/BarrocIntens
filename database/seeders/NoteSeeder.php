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
            'note' => 'Eerste gesprek over de vereisten voor de koffiemachine.',
            'date' => now()->subDays(5),
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Note::create([
            'note' => 'Geactualiseerde prijsoffertes ontvangen voor de koffiemachines.',
            'date' => now()->subDays(2),
            'company_id' => 1,
            'user_id' => 1,
        ]);

        Note::create([
            'note' => 'Geplande demonstratie van de nieuwste koffiemachines.',
            'date' => now(),
            'company_id' => 1,
            'user_id' => 1,
        ]);
    }
}
