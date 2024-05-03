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
                    <form class="form-container" action="{{route('directors.store')}}" method="POST">
                        @csrf
                        <div class="text-base p-2">
                            <label class="text-white form-label" for="name">Nombre del Director: </label>
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <input class="form-input" type="text" name="name" id="name">
                            @else
                            <input class="form-input" type="text" name="name" id="name" value="{{ old('name') }}">
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

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="birthdate">Fecha de Nacimiento: </label>
                            @if($errors->has('birthdate'))
                            <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                            <input class="form-input" type="date" name="birthdate" id="birthdate">
                            @else
                            <input class="form-input" type="date" name="birthdate" id="birthdate" value="{{ old('birthdate') }}">
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