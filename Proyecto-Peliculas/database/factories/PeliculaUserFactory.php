<?php

namespace Database\Factories;

use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeliculaUser>
 */
class PeliculaUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::inRandomOrder()->first()->id;
        //$pelicula_id = Pelicula::inRandomOrder()->first()->id;
        $peliculas_id = [11,12,13,17];
        return [
            'rating' => $this->faker->numberBetween(0,100), 
            'review' => $this->faker->text(255).'.',
            'pelicula_id' => $this->faker->randomElement($peliculas_id),
            'user_id' => $user_id
        ];
    }
}
