<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WelcomeComponent extends Component
{
    public $peliculas;
    
    public function __construct($peliculas)
    {
        $this->peliculas=$peliculas;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.welcome-component');
    }
}
