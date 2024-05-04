<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrar Película') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('peliculas.show', $pelicula->id)}}" class="p-2 rounded boton iflex text-white">
                <x-zondicon-reply class="h-10 w-10 " />
                <p class="p-2">Regresar</p>
            </a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div clas="main-frame">
                    <form class="form-container" action="{{route('peliculas.update', $pelicula)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="text-base p-2">
                            <label class="form-label text-white" for="title">Título:</label>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-input" type="text" name="title" id="title" value="{{$pelicula->peli_title}}"><br>
                        </div>

                        <div class="dropdown">
                            <label class="text-white form-label" for="director">Director</label>

                            @error('director')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <select class="form-dropdown" name="director" id="director">
                                <option value="{{$pelicula->director->id}}">{{$pelicula->director->dir_name}}</option>
                                @foreach ($directors as $director)
                                <option value="{{$director->id}}">{{$director->dir_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="text-base p-2">
                            <label class="form-label text-white" for="studio">Productora:</label>
                            @error('studio')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-input" type="text" name="studio" id="studio" , value="{{$pelicula->peli_studio}}"><br>
                        </div>
                        <div class="text-base p-2">
                            <label class="form-label text-white" for="length">Duración:</label>
                            @error('length')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-input" type="number" name="length" id="length" value="{{$pelicula->peli_length}}"><br>
                        </div>
                        <div class="text-base p-2">
                            <label class="form-label text-white" for="genre">Género:</label>
                            @error('genre')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-input" type="text" name="genre" id="genre" value="{{$pelicula->peli_genre}}"><br>
                        </div>
                        <div class="text-base p-2">
                            <label class="form-label text-white" for="year">Año de Estreno:</label>
                            @error('year')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-input" type="number" name="year" id="year" min="1900" max="2100" value="{{$pelicula->peli_year}}"><br>
                        </div>
                        <div class="text-base p-2">
                            <label class="form-label text-white" for="country">País de Origen:</label>
                            <input class="form-input" type="text" name="country" id="country" value="{{$pelicula->peli_country}}"> <br>
                        </div>

                        <div class="boton form-button" style="width: 100%;">
                            <button class="iflex" type="submit">Actualizar Información <x-zondicon-refresh class="h-10 w-10 p-2" /></button>
                        </div>
                    </form>

                    <form class="form-container text-center" action="{{route('peliculas.destroy', $pelicula)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="boton2 iflex" style="width: 100%;">
                            <input type="submit" value="Eliminar Película" class='button2'>
                            <x-zondicon-trash class="h-10 w-10 p-2" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>