<?php

namespace Database\Factories;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    protected $model = Pelicula::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'peli_title' => $this->faker->sentence(),
            'peli_studio' => $this->faker->sentence(),
            'peli_length' => $this->faker->numberBetween(30, 250),
            'peli_genre' => $this->faker->word(),
            'peli_year' => $this->faker->year(),
            'peli_country' => $this->faker->country(),
            'director_id' => $this->faker->numberBetween(1, 12)
        ];
    }
}
