<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'peli_title' => $this->faker->word(),
            'peli_title' => $this->faker->word(),
            'peli_studio' => ,
            'peli_length' => '',
            'peli_genre' => '',
            'peli_year' => '',
            'peli_country' => '',
            'director_id' => ''
        ];
    }
}
