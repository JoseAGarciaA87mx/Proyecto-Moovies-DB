<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreatePeliculasUsers extends Component
{
    public $pelicula;
    /**
     * Create a new component instance.
     */
    public function __construct($pelicula)
    {
        $this->pelicula =  $pelicula;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.peliculas_users.create');
    }
}
