<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Monument;
use App\Models\Description;
use App\Models\PlaceDescription;
use App\Models\User;
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
            'people' => 'Jānis lielasi, pēteris', 'cover' => 'old'
        ]);
        $m1 = Monument::create([
            'title' => 'Piemērs 24', 'state' => 'jūrmalas', 'location' => 'Lielasi skapis pa klreisi',
            'people' => 'Jānis lielasi', 'cover' => 'new'
        ]);

        $d = Description::create(['content' => 'Labais lielasi piemeērs', 'monument_id' => $m1->id]);
        $d2 = Description::create(['monument_id' => $m->id, 'content' => 'Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem Lierls garš apraksts par kokeiem']);

        $d = PlaceDescription::create(['content' => 'dsa', 'monument_id' => $m1->id]);
        $d2 = PlaceDescription::create(['monument_id' => $m->id, 'content' => 'dsa padsemds gddkeiedds dkiem']);

        User::create(['email' => "a@a", 'password' => "a"]);
    }
}
