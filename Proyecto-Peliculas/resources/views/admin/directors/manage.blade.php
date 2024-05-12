<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrar Director') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('directors.show', $director->id)}}" class="p-2 rounded boton iflex text-white">
                <x-zondicon-reply class="h-10 w-10 " />
                <p class="p-2">Regresar</p>
            </a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div clas="main-frame">
                    <form class="form-container" action="{{route('directors.update', $director)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="text-base p-2">
                            <label class="form-label text-white" for="name">Nombre:</label>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-input" type="text" name="name" id="name" value="{{$director->dir_name}}"><br>
                        </div>

                        <div class="text-base p-2">
                            <label class="form-label text-white" for="country">País de Origen:</label>
                            @error('country')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-input" type="text" name="country" id="country" value="{{$director->dir_country}}"> <br>
                        </div>

                        <div class="text-base p-2">
                            <label class="text-white form-label" for="birthdate">Fecha de Nacimiento: </label>
                            @error('country')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input class="form-input" type="date" name="birthdate" id="birthdate" value="{{$director->dir_birthdate}}">
                        </div>

                        <div class="boton form-button" style="width: 100%">
                            <button class="iflex" type="submit">Actualizar Información <x-zondicon-refresh class="h-10 w-10 p-2" /></button>
                        </div>
                    </form>

                    <form class="form-container text-center" action="{{route('directors.destroy', $director)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="boton2 iflex" style="width: 100%;">
                            <input type="submit" value="Eliminar Director" class='button2'>
                            <x-zondicon-trash class="h-10 w-10 p-2" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>