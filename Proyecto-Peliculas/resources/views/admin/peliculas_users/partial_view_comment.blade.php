<div class="bg-gray-700 rounded-lg shadow-md px-2 py-2">
                <h4 style="display: flex; justify-content: space-between;">
                    <span>{{ $review->name }}</span>
                    <span style="color: gray;">{{ $review->pivot->updated_at }}</span>
                </h4>

                <p>
                    Calificación: <x-rating-color :rating="$review->pivot->rating" />
                </p>

                <div class="review_container">
                    {{ $review->pivot->review }}
                </div>
</div>