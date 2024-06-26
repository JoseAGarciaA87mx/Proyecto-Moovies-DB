<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EveryReviewPeliculasUsers extends Component
{
    public $reviews;
    /**
     * Create a new component instance.
     */
    public function __construct($reviews)
    {
        $this->reviews = $reviews;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.peliculas_users.every_review');
    }
}
