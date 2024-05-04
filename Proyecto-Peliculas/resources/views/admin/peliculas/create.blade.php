<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Pelicula') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
                    <h1 style="color: lightcoral; font-size: 20px;">Llena todos los campos</h1>
                </div>

                <div class="main-frame">
                    <form class="form-container" action="{{route('peliculas.store')}}" method="POST">
                        @csrf
                        <div class="text-base p-2">
                            <label class="text-white form-label" for="title">Título: </label>
                            @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            <input class="form-input" type="text" name="title" id="title">
                            @else
                            <input class="form-input" type="text" name="title" id="title" value="{{ old('title') }}">
                            @endif
                        </div>

                        <!--directores-->

                        <div class="dropdown">
                            <label class="text-white form-label" for="director">Director</label>

                            @if($errors->has('director'))
                            <span class="text-danger">{{ $errors->first('director') }}</span>
                            @endif

                            <select class="form-dropdown" name="director" id="director">
                                @if($errors->has('director'))
                                <option value="" selected disabled>Seleccionar director</option>
                                @else
                                    @if(old('director'))
                                    <option value="{{ old('director') }}" {{ old('director') ? 'selected' : '' }}>
                                        <!--Itera hasta encontrar el nombre del id del input anterior-->
                                        @foreach($directors as $director)
                                            @if($director->id == old('director'))
                                                {{ $director->dir_name }}
                                            @endif
                                        @endforeach 
                                    </option>
                                    @else
                                    <option value="" selected disabled>Seleccionar director</option>
                                    @endif
                                @endif
                                @foreach ($directors as $director)
                                <option value="{{$director->id}}">{{$director->dir_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="text-base p-2">
                            <label class="text-white form-label" for="studio">Productora: </label>
                            @if($errors->has('studio'))
                            <span class="text-danger">{{ $errors->first('studio') }}</span>
                            <input class="form-input" type="text" name="studio" id="studio">
                            @else
                            <input class="form-input" type="text" name="studio" id="studio" value="{{ old('studio') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="length">Duración: </label>
                            @if($errors->has('length'))
                            <span class="text-danger">{{ $errors->first('length') }}</span>
                            <input class="form-input" type="number" name="length" id="length">
                            @else
                            <input class="form-input" type="number" name="length" id="length" value="{{ old('length') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="genre">Género: </label>
                            @if($errors->has('genre'))
                            <span class="text-danger">{{ $errors->first('genre') }}</span>
                            <input class="form-input" type="text" name="genre" id="genre">
                            @else
                            <input class="form-input" type="text" name="genre" id="genre" value="{{ old('genre') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="year">Año de Estreno: </label>
                            @if($errors->has('year'))
                            <span class="text-danger">{{ $errors->first('year') }}</span>
                            <input class="form-input" type="number" name="year" id="year">
                            @else
                            <input class="form-input" type="number" name="year" id="year" value="{{ old('year') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="country">País de Origen: </label>
                            @if($errors->has('country'))
                            <span class="text-danger">{{ $errors->first('country') }}</span>
                            <input class="form-input" type="text" name="country" id="country">
                            @else
                            <input class="form-input" type="text" name="country" id="country" value="{{ old('country') }}">
                            @endif
                        </div>

                        <div class="boton">
                            <button class="iflex" type="submit">Registrar <x-zondicon-film class="h-10 w-10 p-2" /></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>