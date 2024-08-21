<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Monument;
use App\Models\Description;
use App\Models\Interval;
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
        Type::create(['title' => 'Muzejs vai ekspozīcija']);

        Interval::create(['title' => '1900 - 1910']);
        Interval::create(['title' => '1914 - 1918']);
        Interval::create(['title' => '1919 - 1920']);
        Interval::create(['title' => '1920 - 1939']);
        Interval::create(['title' => '1940 - 1941']);
        Interval::create(['title' => '1941 - 1945']);
        Interval::create(['title' => '1944 - 1953']);
        Interval::create(['title' => '1953 - 1985']);
        Interval::create(['title' => '1985 - 1990']);
        Interval::create(['title' => '1991 - ']);

        $m = Monument::factory()
            ->count(10)
            ->create()
            ->each(function ($monument) {
                $randomTypeIds = Type::inRandomOrder()->take(rand(2, 3))->pluck('id');
                $monument->types()->attach($randomTypeIds);
            })
            ->each(function ($monument) {
                $randomTypeIds = Interval::inRandomOrder()->take(rand(1, 2))->pluck('id');
                $monument->intervals()->attach($randomTypeIds);
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
