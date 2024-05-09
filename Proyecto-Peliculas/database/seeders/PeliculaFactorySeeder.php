<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeliculaFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelicula::factory(10)->create();
    }
}
