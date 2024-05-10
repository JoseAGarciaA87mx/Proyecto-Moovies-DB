<!--este archivo se llama como componente en peliculas.show-->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg text-center">
                <h1 style="color: lightcoral; font-size: 20px;">Deja tu Reseña de la Pelicula</h1>
            </div>

            <form class="form-container" action="{{route('peliculas.store_comment', $pelicula->id)}}" method="POST">
                @csrf
                <div class="text-base p-2">
                    <label class="text-white form-label" for="rating">Calificación: </label>
                    @if($errors->has('rating'))
                    <span class="text-danger">{{ $errors->first('rating') }}</span>
                    <input class="form-input" type="number" name="rating" id="rating" pattern="[0-9]+" required min="0" max="100">
                    @else
                    <input class="form-input" type="number" name="rating" id="rating" pattern="[0-9]+" required min="0" max="100" value="{{ old('rating') }}">
                    @endif
                </div>

                <div class="text-base p-2">
                    <label class="text-white form-label" for="review">Reseña: </label>
                    @if($errors->has('review'))
                    <span class="text-danger">{{ $errors->first('review') }}</span>
                    <textarea class="form-input" id="review" name="review" rows="4" maxlength="255" required></textarea>
                    @else
                    <textarea class="form-input" id="review" name="review" rows="4" maxlength="255" required value="{{ old('review') }}"></textarea>
                    @endif
                </div>

                <div class="boton">
                    <button class="iflex" type="submit">Enviar Reseña <x-zondicon-conversation class="h-10 w-10 p-2" /></button>
                </div>

            </form>

        </div>
    </div>
</div>