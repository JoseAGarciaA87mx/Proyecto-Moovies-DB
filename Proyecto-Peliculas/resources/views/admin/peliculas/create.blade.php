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
                    <form class="form-container" action="{{route('peliculas.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="text-base p-2">
                            <label class="text-white form-label" for="title">Título: </label>
                            @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            <input class="form-input" type="text" name="title" id="title" required maxlength="100">
                            @else
                            <input class="form-input" type="text" name="title" id="title" required maxlength="100" value="{{ old('title') }}">
                            @endif
                        </div>

                        <!--directores-->

                        <div class="dropdown">
                            <label class="text-white form-label" for="director">Director</label>

                            @if($errors->has('director'))
                            <span class="text-danger">{{ $errors->first('director') }}</span>
                            @endif

                            <select class="form-dropdown" name="director" id="director" required>
                                @if($errors->has('director'))
                                <option value="" selected disabled>Seleccionar director</option>
                                @else
                                @if(old('director'))
                                <option value="{{ old('director') }}" {{ old('director') ? 'selected' : '' }}>
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
                            <input class="form-input" type="text" name="studio" id="studio" required max="100">
                            @else
                            <input class="form-input" type="text" name="studio" id="studio" required max="100" value="{{ old('studio') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="length">Duración: </label>
                            @if($errors->has('length'))
                            <span class="text-danger">{{ $errors->first('length') }}</span>
                            <input class="form-input" type="number" name="length" id="length" required  max="10000">
                            @else
                            <input class="form-input" type="number" name="length" id="length" required  max="10000" value="{{ old('length') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="genre">Género: </label>
                            @if($errors->has('genre'))
                            <span class="text-danger">{{ $errors->first('genre') }}</span>
                            <input class="form-input" type="text" name="genre" id="genre" required  max="100" >
                            @else
                            <input class="form-input" type="text" name="genre" id="genre" required  max="100" value="{{ old('genre') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="year">Año de Estreno: </label>
                            @if($errors->has('year'))
                            <span class="text-danger">{{ $errors->first('year') }}</span>
                            <input class="form-input" type="number" name="year" id="year" pattern="[0-9]+" required min="1900" max="2100" >
                            @else
                            <input class="form-input" type="number" name="year" id="year" pattern="[0-9]+" required min="1900" max="2100" value="{{ old('year') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="country">País de Origen: </label>
                            @if($errors->has('country'))
                            <span class="text-danger">{{ $errors->first('country') }}</span>
                            <input class="form-input" type="text" name="country" id="country" required  max="100">
                            @else
                            <input class="form-input" type="text" name="country" id="country" required  max="100" value="{{ old('country') }}">
                            @endif
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="image">Selecciona Una Imagen de Poster </label>
                            @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            <input class="file-input" type="file" name="image" id="image" require="false" accept="image/*" required max="10000">

                        </div>


                        <div class="boton p-2">
                            <button class="iflex" type="submit">Registrar <x-zondicon-film class="h-10 w-10 p-2" /></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>