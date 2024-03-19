<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <h1 class="header">Peliculas Disponibles</h1>
    
    <div class="card"> 
        <a href="{{route('peliculas.create')}}">Registrar Película</a>
    </div>  

    @foreach($peliculas as $pelicula)
        <div class ="card2">
            <h2>{{ $pelicula->peli_title }}</h2>
            <ul>
                <li>{{ $pelicula->peli_genre }}</li>
                <li>{{ $pelicula->peli_length }} min</li>
                <li>{{ $pelicula->peli_year }}</li>
            </ul>
            <a href="{{route('peliculas.show', $pelicula->id)}}" style="color: lightcoral;">Más Información</a>
        </div>
    @endforeach
            </div>
        </div>
    </div>
</x-app-layout>