<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenericController extends Controller
{
    public function index()
    {
        $user_id= Auth::user()->id;
        return redirect()->route('users.reviews', $user_id);
    }

    public function show_reviews_form_user($user_id)
    {

        $this->authorize('author', User::find($user_id));

        $user = User::find($user_id);

        $reviews = $user->peliculas()->withPivot('rating', 'review', 'updated_at', 'pelicula_id')
            ->orderBy('updated_at', 'desc')->get(); 

        //return($reviews);

        return view('admin.users.my_reviews', compact('reviews'));
    }
}
