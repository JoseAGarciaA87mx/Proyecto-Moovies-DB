<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle de Pelicula') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div clas="form">

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
                        <h1 style="color: lightcoral; font-size: 32px;">{{ $pelicula->peli_title }}</h1>
                    </div>

                    <div class="form-label">
                        <img src="{{ asset($pelicula->image_url) }}" alt="$pelicula->image_url">
                        <div class="boton text-white text-center" style="width: 100%;">
                        <a class="iflex" href="{{ asset($pelicula->image_url) }}">Descargar Poster <x-zondicon-download class="h-10 w-10 p-2" /></a>
                        </div>
                    </div>

                    <ul class="show-field">
                        <li><span class="show-label"> Productora: </span> {{ $pelicula->peli_studio }}</li>
                        <li><span class="show-label"> Director: <a href="{{route('directors.show', $pelicula->director->id)}}" class="show-href">  {{ $pelicula->director->dir_name }} </a></span> </li>
                        <li><span class="show-label"> País de Origen: </span> {{ $pelicula->peli_country }}</li>
                        <li><span class="show-label"> Género: </span> {{ $pelicula->peli_genre }}</li>
                        <li><span class="show-label"> Duración: </span> {{ $pelicula->peli_length }} min</li>
                        <li><span class="show-label"> Año de Estreno: </span> {{ $pelicula->peli_year }}</li>
                        <li><span class="show-label"> Rating de la Comunidad: </span> <x-rating-color :rating="$pelicula->score"/> </li>
                    </ul>

                    <div class="boton text-white text-center" style="width: 100%;">
                        <a class="iflex" href="{{route('peliculas.edit', $pelicula)}}">Administrar Película <x-zondicon-compose class="h-10 w-10 p-2" /></a>
                    </div>

                </div>
            </div>
        </div>

        @if($userReview == null)
            <x-create-peliculas-users :pelicula="$pelicula" />
            
        @else 
            <br>
            <x-manage-peliculas-users :pelicula="$pelicula" :userReview="$userReview"/>
        @endif
        <br>
        <x-every-review-peliculas-users :reviews="$reviews" />
    </div>
</x-app-layout>