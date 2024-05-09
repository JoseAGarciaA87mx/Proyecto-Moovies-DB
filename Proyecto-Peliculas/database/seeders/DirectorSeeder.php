<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = [
            ['dir_name' => 'Desconocido', 'dir_country' => 'Desconocido', 'dir_birthdate' => '1900-01-01', 'created_at' => '2024-05-03 06:51:40', 'updated_at'=> '2024-05-03 23:43:37'],
            ['dir_name' => 'Luis Estrada', 'dir_country' => 'Mexico', 'dir_birthdate' => '1962-01-17', 'created_at' => '2024-05-03 07:13:24', 'updated_at'=> '2024-05-03 07:13:24'],
            ['dir_name' => 'Alenjandro Gonzalez Iñarritu', 'dir_country' => '', 'dir_birthdate' => '1963-08-15', 'created_at' => '2024-05-03 23:28:13', 'updated_at'=> '2024-05-03 23:28:13'],
            ['dir_name' => 'Federico Fellini', 'dir_country' => 'Mexico', 'dir_birthdate' => '1920-01-20', 'created_at' => '2024-05-03 23:29:54', 'updated_at'=> '2024-05-03 23:29:54'],
            ['dir_name' => 'David Lynch', 'dir_country' => 'Italia', 'dir_birthdate' => '1946-01-20', 'created_at' => '2024-05-03 23:31:08', 'updated_at'=> '2024-05-03 23:31:08'],
            ['dir_name' => 'Francis Ford Coppola', 'dir_country' => 'Estados Unidos', 'dir_birthdate' => '1946-04-07', 'created_at' => '2024-05-03 23:32:17', 'updated_at'=> '2024-05-03 23:32:17'],
            ['dir_name' => 'George Lucas', 'dir_country' => 'Estados Unidos', 'dir_birthdate' => '1944-05-14', 'created_at' => '2024-05-03 23:35:22', 'updated_at'=> '2024-05-03 23:35:22'],
            ['dir_name' => 'James Cameron', 'dir_country' => 'Estados Unidos', 'dir_birthdate' => '1954-08-16', 'created_at' => '2024-05-03 23:38:39', 'updated_at'=> '2024-05-03 23:38:39'],
            ['dir_name' => 'Jonathan Demme', 'dir_country' => 'Estados Unidos', 'dir_birthdate' => '1944-02-22', 'created_at' => '2024-05-03 23:41:00', 'updated_at'=> '2024-05-03 23:41:00'],
            ['dir_name' => 'Andrew Stanton', 'dir_country' => 'Estados Unidos', 'dir_birthdate' => '1965-12-03', 'created_at' => '2024-05-03 23:42:06', 'updated_at'=> '2024-05-03 23:42:06'],
            ['dir_name' => 'Peter Jackson', 'dir_country' => 'Nueva Zelanda', 'dir_birthdate' => '1961-08-31', 'created_at' => '2024-05-04 04:13:51', 'updated_at'=> '2024-05-04 04:18:51'],
            ['dir_name' => 'Martin Scorcese', 'dir_country' => 'Estados Unidos', 'dir_birthdate' => '1942-11-17', 'created_at' => '2024-05-08 08:05:58', 'updated_at'=> '2024-05-08 08:05:58'],
        ];

        Director::insert($seeds); //insertar con modelo de eloquent
    }
}
