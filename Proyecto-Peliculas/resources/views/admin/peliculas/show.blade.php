<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div clas ="card">
            <h1 class="header">{{ $pelicula->peli_title }}</h1>
            <div class="card"> 
                <a href="{{route('peliculas.index')}}">Todas las Películas</a>
                <a href="{{route('peliculas.create')}}">Registrar Película</a>
            </div>  
            <ul>
                <li><span style="color: darkolivegreen;"> Productora: </span> {{ $pelicula->peli_studio }}</li>
                <li><span style="color: darkolivegreen;"> País de Origen: </span> {{ $pelicula->peli_country }}</li>
                <li><span style="color: darkolivegreen;"> Género: </span> {{ $pelicula->peli_genre }}</li>
                <li><span style="color: darkolivegreen;"> Duración: </span> {{ $pelicula->peli_length }} min</li>
                <li><span style="color: darkolivegreen;"> Año de Estreno: </span> {{ $pelicula->peli_year }}</li>
            </ul>

            <a href="{{route('peliculas.edit', $pelicula)}}" style="color: lightcoral;">Administrar Película</a>
        </div>
            </div>
        </div>
    </div>
</x-app-layout>