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

            @each( 'admin.peliculas_users.partial_view_comment', $reviews, 'review' )

            @endif

            @else

            <p>Esta Pelicula no tiene Reseñas</p>

            @endif
        </div>
    </div>
</div>