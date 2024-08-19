<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Description;
use App\Models\PlaceDescription;
use App\Models\Monument;

class MonumentFactory extends Factory
{
    protected $model = Monument::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),  // Generates a random 3-word title
            'state' => $this->faker->state,        // Generates a random state name
            'location' => $this->faker->address,   // Generates a random address
            'people' => $this->faker->name,        // Generates a random name for people
            'cover' => $this->faker->word,         // Generates a random word for cover
        ];
    }
}
