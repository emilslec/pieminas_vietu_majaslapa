<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Role;
use App\Models\Person;
use App\Models\Monument;
use App\Models\Participant;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $t = Type::create(['title' => 'Piemineklis']);
        $t1 = Type::create(['title' => 'Apbedījums']);

        $r = Role::create(['title' => 'Pieminekļa autors']);
        $r1 = Role::create(['title' => 'Citas saistības']);

        $p = Person::create(['name' => 'Jānis', 'surname' => 'Lielais']);
        $p1 = Person::create(['name' => 'Pēteris', 'surname' => 'Banāns']);

        $m = Monument::create(['title' => 'Brīvības piemineklis', 'description' => 'Liels piemineklis centrā', 'type_id' => $t->id]);
        $m1 = Monument::create(['title' => 'Piemērs 24', 'description' => 'Labais lielasi piemeērs', 'type_id' => $t1->id]);

        Participant::create(['person_id' => $p->id, 'role_id' => $r->id, 'monument_id' => $m->id]);
        Participant::create(['person_id' => $p->id, 'role_id' => $r1->id, 'monument_id' => $m1->id]);
        Participant::create(['person_id' => $p1->id, 'role_id' => $r->id, 'monument_id' => $m1->id]);
    }
}
