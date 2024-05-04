<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Películas') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
        <h1 style="color: lightcoral; font-size: 32px;">Directores Registrados</h1>
      </div>

      <div class="p-2 boton">
        <a href="{{route('directors.create')}}" class="p-2 rounded" style="color:black; display: inline-flex; width:100%;">
          <x-zondicon-add-outline class="h-10 w-10 " />
          <p class="p-2">Registrar Nuevo Director</p>
        </a>
      </div>

      <div class="bg-gray-800 rounded-lg pb-1 text-white">
        @foreach($directors as $director)
        <div class="bg-gray-700 rounded-lg shadow-md px-2 py-2">
          <h4 style="display: flex; justify-content: space-between;">
            <span>{{ $director->dir_name }}</span>
            <span>{{ $director->dir_country }}</span>
          </h4>
          <a href="{{route('directors.show', $director->id)}}" style="color:lightcoral">Más Información</a>
        </div>
        @endforeach
      </div>

    </div>
  </div>


</x-app-layout>