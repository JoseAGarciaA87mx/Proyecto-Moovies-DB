<?php

namespace Database\Seeders;

use App\Models\PeliculaUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeliculaUserFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PeliculaUser::factory(30)->create();
    }
}
