<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Monument;
use App\Models\Description;
use App\Models\PlaceDescription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Type::create(['title' => 'Piemineklis (Apaļskulptūra vai tamlīdzīgi)']);
        Type::create(['title' => 'Piemiņas zīme (plāksne vai kas necils)']);
        Type::create(['title' => 'Piemiņas vietas komplekss']);
        Type::create(['title' => 'Piemiņas vieta (bez izcēluma dabā)']);
        Type::create(['title' => 'Apbedījums (esošs vai simbolisks civilpersonai)']);
        Type::create(['title' => 'Apbedījums (esošs vai simbolisks cīnitājam, vai vairākiem']);
        Type::create(['title' => 'Karavīru kapi (arī vienai vai divām personām)']);
        Type::create(['title' => 'Muzejs vai .........']);


        $m = Monument::factory()
            ->count(50000)
            ->create()
            ->each(function ($monument) {
                $randomTypeIds = Type::inRandomOrder()->take(rand(2, 3))->pluck('id');
                $monument->types()->attach($randomTypeIds);
            });
        foreach ($m as $monument) {
            Description::create([
                'content' => Str::random(100),
                'monument_id' => $monument->id,
            ]);

            PlaceDescription::create([
                'content' => Str::random(100),
                'monument_id' => $monument->id,
            ]);
        }
    }
}
