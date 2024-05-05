<!--este archivo se llama como componente en peliculas.show y en all_reviews-->

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
            <h1 style="color: lightcoral; font-size: 20px;">Reseñas de la Pelicula</h1>
        </div>

        <div class="show-field">
            @if($reviews != null)

            @if($reviews->isEmpty())
            <p>Tu Reseña es La Única Disponible</p>
            @else

            @foreach($reviews as $review)
            <div class="bg-gray-700 rounded-lg shadow-md px-2 py-2">
                <h4 style="display: flex; justify-content: space-between;">
                    <span>{{ $review->name }}</span>
                    <span style="color: gray;">{{ $review->pivot->updated_at }}</span>
                </h4>

                <p>Calificación:
                    @if($review->pivot->rating > 95)
                    <span style="color:  #0971ed ;">
                        @elseif($review->pivot->rating > 90)
                        <span style="color:  #09ed6a ;">
                            @elseif($review->pivot->rating > 80)
                            <span style="color:   #6ded09 ;">
                                @elseif($review->pivot->rating > 70)
                                <span style="color:   #bded09 ;">
                                    @elseif($review->pivot->rating > 60)
                                    <span style="color:   #edb909  ;">
                                        @elseif($review->pivot->rating > 50)
                                        <span style="color:   #ed6609  ;">
                                            @else
                                            <span style="color:   #ed0909   ;">
                                                @endif

                                                {{ $review->pivot->rating }}</span>
                </p>

                <div class="review_container">
                    {{ $review->pivot->review }}
                </div>
            </div>
            @endforeach
            @endif

            @else

            <p>Esta Pelicula no tiene Reseñas</p>

            @endif
        </div>
    </div>
</div>