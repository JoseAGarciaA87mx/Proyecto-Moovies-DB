<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
        <h1 style="color: lightcoral; font-size: 20px;">Tienes Una Reseña de Esta Pelicula</h1>
    </div>
    
    <br>

    <div class="text-white text-center">Última Modificación: <span style="color:gray"> {{ $userReview->pivot->updated_at}} </span></div>

    <form class="form-container" action="{{route('peliculas.update_comment', $pelicula)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="text-base p-2">
            <label class="text-white form-label" for="rating">Calificación: </label>
            @error('review')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <input class="form-input" type="number" name="rating" id="rating" pattern="[0-9]+" required min="0" max="100"value="{{ $userReview->pivot->rating }}">
        </div>

        <div class="text-base p-2">
            <label class="text-white form-label" for="review">Reseña: </label>
            @error('review')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <textarea class="form-input" id="review" name="review" rows="4" maxlength="255" required>{{ $userReview->pivot->review }}</textarea>
        </div>

        <div class="boton" style="width: 100%;">
            <button class="iflex" type="submit">Actualizar Reseña<x-zondicon-film class="h-10 w-10 p-2" /></button>
        </div>
    </form>

    <form class="form-container text-center" action="{{route('peliculas.delete_comment', $pelicula)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="boton2 iflex" style="width: 100%;">
            <input type="submit" value="Eliminar Reseña" class='button2'>
            <x-zondicon-trash class="h-10 w-10 p-2" />
        </div>
    </form>
</div>