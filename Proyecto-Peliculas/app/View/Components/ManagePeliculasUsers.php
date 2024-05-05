<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ManagePeliculasUsers extends Component
{
    public $pelicula, $userReview;
    /**
     * Create a new component instance.
     */
    public function __construct($pelicula, $userReview)
    {
        $this->pelicula = $pelicula;
        $this->userReview = $userReview;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.peliculas_users.manage');
    }
}
