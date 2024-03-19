<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Pelicula') }}
        </h2>
    </x-slot>

    <div class="py-12">S
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="main_frame">
        <h1 class="header">Registra una Pelicula</h1>
        <div clas ="card">   
            <div class="card"> 
                <a href="{{route('peliculas.index')}}">Todas las Películas</a>
            </div>         
            <form action="{{route('peliculas.store')}}" method="POST">
                @csrf
                <div class = "inciso">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title"><br>
                </div>
                
                <!-- Aquí Pongo lo de Directores-->

                <div class = "inciso">
                    <label for="studio">Productora</label>
                    <input type="text" name="studio" id="studio"><br>
                </div>
                <div class = "inciso">
                    <label for="length">Duración</label>
                    <input type="number" name="length" id="length"><br>
                </div>
                <div class = "inciso">
                    <label for="genre">Género</label>
                    <input type="text" name="genre" id="genre"><br>
                </div>
                <div class = "inciso">
                    <label for="year">Año de Estreno</label>
                    <input type="number" name="year" id="year" min="1900" max="2100"> <br>
                </div>
                <div class = "inciso">
                    <label for="country">País de Origen</label>
                    <input type="text" name="country" id="country"> <br>
                </div>

                <input type="submit" value="Registrar Película" class="button1">

            </form>
        </div>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>