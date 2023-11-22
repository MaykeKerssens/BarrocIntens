<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => 'In afwachting van goedkeuring',
            'description' => 'Het reparatueverzoek is ingediend en wacht op goedkeuring van de bevoegde autoriteit.',
            'color'=> 'blue',
        ]);

        Status::create([
            'name' => 'Goedgekeurd',
            'description' => 'Het reparatieverzoek is beoordeeld en geautoriseerd voor verdere afhandeling.',
            'color'=> 'green',
        ]);

        Status::create([
            'name' => 'Ingepland',
            'description' => 'De reparatie is ingepland voor een specifieke datum en tijd, en aangewezen aan een of meerdere reperateurs.',
            'color'=> 'green',
        ]);

        Status::create([
            'name' => 'Bezig',
            'description' => 'Het team is begonnen met werken aan de reparatie',
            'color'=> 'green',
        ]);

        Status::create([
            'name' => 'In Afwachting',
            'description' => 'De reparatie is tijdelijk gepauzeerd, vaak vanwege externe factoren of beperkingen in middelen.',
            'color'=> 'yellow',
        ]);

        Status::create([
            'name' => 'Wacht op Onderdelen',
            'description' => 'Geeft aan dat de reparatie in afwachting is omdat de benodigde onderdelen of materialen nog niet beschikbaar zijn.',
            'color'=> 'yellow',
        ]);

        Status::create([
            'name' => 'Voltooid',
            'description' => 'De reparatie is succesvol afgerond.',
            'color'=> 'blue',
        ]);

        Status::create([
            'name' => 'Geannuleerd',
            'description' => 'Het reparatieverzoek is geannuleerd, hetzij door de aanvrager of om andere redenen.',
            'color'=> 'blue',
        ]);

        Status::create([
            'name' => 'Afgesloten',
            'description' => 'Markeert de oplossing van het reparatieverzoek, wat aangeeft dat er geen verdere actie nodig is.',
            'color'=> 'green',
        ]);

        Status::create([
            'name' => 'Geëscaleerd',
            'description' => 'Het reparatieverzoek is doorgestuurd naar een hoger niveau van management of expertise voor afhandeling.',
            'color'=> 'red',
        ]);

        Status::create([
            'name' => 'Heropend',
            'description' => 'Als een probleem weer opduikt nadat het als afgesloten is gemarkeerd, kan het reparatieverzoek worden heropend voor verdere aandacht.',
            'color'=> 'yellow',
        ]);

        Status::create([
            'name' => 'Wachten op Bevestiging van de Klant',
            'description' => 'De reparatie is voltooid, maar het onderhoudsbedrijf wacht op bevestiging van de klant dat het probleem naar tevredenheid is opgelost.',
            'color'=> 'yellow',
        ]);

        Status::create([
            'name' => 'Vertraagd',
            'description' => 'De reparatie duurt langer dan verwacht, en er is vertraging in het oplossingsproces.',
            'color'=> 'yellow',
        ]);

        Status::create([
            'name' => 'Noodgeval',
            'description' => 'Geeft aan dat het reparatieverzoek een hoge prioriteit heeft en onmiddellijke aandacht vereist.',
            'color'=> 'red',
        ]);

        // Possible feauture to add in the future
        // Status::create([
        //     'name' => 'Feedback Gevraagd',
        //     'description' => 'De reparatie is voltooid, en het onderhoudsbedrijf vraagt om feedback van de klant over de verleende service.',
        // ]);
    }
}
