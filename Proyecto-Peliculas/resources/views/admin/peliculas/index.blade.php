<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Películas') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
        <h1 style="color: lightcoral; font-size: 32px;">Peliculas Disponibles</h1>
      </div>

      <div class="p-2 boton">
        <a href="{{route('peliculas.create')}}" class="p-2 rounded" style="color:black; display: inline-flex;">
          <x-zondicon-add-outline class="h-10 w-10 "/><p class="p-2">Registrar Nueva Pelicula</p>
        </a>
      </div>

      <div class="bg-gray-800 rounded-lg pb-1 text-white" style="display: flex; flex-wrap: wrap">
        @foreach($peliculas as $pelicula)
        <div class="bg-gray-700 rounded-lg shadow-md px-2 py-2" style="width: 50%; padding: 10px;">
          <h4>{{ $pelicula->peli_title }}<br><span>{{ $pelicula->peli_length }} min</span></h4>
          <ul>
            <li>{{ $pelicula->peli_genre }}</li>
            <li>{{ $pelicula->peli_year }}</li>
          </ul>

          <div class="iflex">
            <a href="{{route('peliculas.show', $pelicula->id)}}" style="color:lightcoral">Más Información</a>
            <a style="color:lightblue; padding-left: 100px">Me Gusta</a>
          </div>

        </div>
        @endforeach
      </div>

    </div>
  </div>


</x-app-layout>