<div>
    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <x-application-logo class="block h-12 w-auto" />

        <h1 class="mt-4 text-2xl font-medium text-gray-900 dark:text-white">
            Proyecto 2, powered by Jetstream.
        </h1>

        <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed">
            Por alguna razón varias clases de Tailwind no me agarran.
        </p>

    </div>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
        <h1 style="color: lightcoral; font-size: 32px;">Peliculas más comentadas</h1>
    </div>

    @php
    $contador = 0;
    @endphp

    @foreach($peliculas as $pelicula)
    <div class="bg-gray-800 rounded-lg pb-1 index-container bg-center text-white content-center">
        <div class="ml-4 text-center">
            @php
            $contador++;
            @endphp
            <h1> {{ $contador }} </h1>
        </div>

        <div class="bg-gray-700 rounded-lg shadow-md px-2 py-2 bg-center" style="width: 50%; padding: 10px;">

            <h3 style="color:goldenrod">{{ $pelicula->peli_title }}</h3>
            <ul>
                <li>{{ $pelicula->peli_length }} min</li>
                <li>{{ $pelicula->peli_genre }}</li>
                <li>{{ $pelicula->peli_year }}</li>
            </ul>

            <div class="center">
                <a href="{{route('peliculas.show', $pelicula->id)}}" style="color:lightcoral">Más Información</a>
            </div>

        </div>
        <img src="{{ asset($pelicula->image_url) }}" alt="$pelicula->image_url" style="height: 150px;">
    </div>
    @endforeach

</div>