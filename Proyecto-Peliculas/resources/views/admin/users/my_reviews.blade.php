<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Reseñas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
                <h1 style="color: lightcoral; font-size: 32px;">Reseñas Registradas</h1>
            </div>

            <div class="show-field">
                @if($reviews != null)
                @foreach($reviews as $review)

                <div class="bg-gray-700 rounded-lg shadow-md px-2 py-2">
                    <h4 style="display: flex; justify-content: space-between;">
                        <a href="{{ route('peliculas.show', $review->id) }}" class="show-href"> {{ $review->peli_title }}</a>
                        <span style="color: gray;">{{ $review->pivot->updated_at }}</span>
                    </h4>

                    <p>
                        Calificación: <x-rating-color :rating="$review->pivot->rating" />
                    </p>

                    <div class="review_container">
                        {{ $review->pivot->review }}
                    </div>
                </div>
                @endforeach

                @else

                <p>No Tienes Reseñas Registradas</p>

                @endif
            </div>

        </div>
    </div>
</x-app-layout>