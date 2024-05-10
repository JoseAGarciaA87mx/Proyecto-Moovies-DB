<?php

use App\Http\Controllers\DirectorController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\GenericController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo', function () {
    return view('demo');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/peliculas/{pelicula}/store_comment', [PeliculaController::class, 'store_comment'])
        ->name('peliculas.store_comment');
    Route::put('/peliculas/{pelicula}/update_comment', [PeliculaController::class, 'update_comment'])
        ->name('peliculas.update_comment');
    Route::delete('/peliculas/{pelicula}/delete_comment', [PeliculaController::class, 'delete_comment'])
        ->name('peliculas.delete_comment');
    Route::resource('peliculas', PeliculaController::class);

    Route::resource('directors', DirectorController::class);

    Route::get('/misreseñas', [GenericController::class, 'index'])
    ->name('users.index');
    Route::get('/peliculas/{user_id}/misreseñas', [GenericController::class, 'show_reviews_form_user'])
    ->name('users.reviews');
});

