<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Role;
use App\Models\Person;
use App\Models\Monument;
use App\Models\Participant;
use App\Models\Description;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $t = Type::create(['title' => 'Piemineklis']);
        $t1 = Type::create(['title' => 'Apbedījums']);

        $m = Monument::create([
            'title' => 'Brīvības piemineklis', 'state' => 'rīgas', 'location' => 'Lielasi skapis pa labi',
            'people' => 'Jānis lielasi, pēteris', 'type_id' => $t->id
        ]);
        $m1 = Monument::create([
            'title' => 'Piemērs 24', 'state' => 'jūrmalas', 'location' => 'Lielasi skapis pa klreisi',
            'people' => 'Jānis lielasi', 'type_id' => $t1->id
        ]);

        $d = Description::create(['content' => 'Labais lielasi piemeērs', 'monument_id' => $m1->id]);
        $d2 = Description::create(['monument_id' => $m->id, 'content' => 'Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem']);
    }
}
