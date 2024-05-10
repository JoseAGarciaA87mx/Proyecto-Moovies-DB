<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-comment', function(User $user, $pelicula_id) {
            return $user->peliculas()->where('pelicula_id', $pelicula_id)->exists();
        });

        //Gate para evitar que existan relaciones n:m duplicadas
        Gate::define('create-comment', function(User $user, $pelicula_id) {
            return !($user->peliculas()->where('pelicula_id', $pelicula_id)->exists());
        });
    }
}
