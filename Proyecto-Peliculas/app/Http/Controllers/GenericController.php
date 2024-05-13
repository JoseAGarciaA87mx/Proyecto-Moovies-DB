<?php

namespace App\Http\Controllers;

use App\Mail\MailablePersonalizado;
use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use stdClass;

class GenericController extends Controller
{
    public function index()
    {
        $user_id= Auth::user()->id;
        return redirect()->route('users.reviews', $user_id);
    }

    public function dashboard()
    {
        $peliculas = Pelicula::withCount('users')->take(5)->groupBy('peliculas.id')->orderBy('users_count', 'desc')->get();

        foreach($peliculas as $pelicula){
            if($pelicula->image_url!=null){
                $pelicula->image_url = 'storage/miniposters'.substr($pelicula->image_url, 16);
            } else {
                $pelicula->image_url = 'storage/miniposters/HTTvejiPAfHYp81ECgiM3VVBvzkh2NVwWIvcuqoQ.jpg';
            }
        }

        return view('dashboard', compact('peliculas'));
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

    public function send_review_mail($user, $peli_id, $review, $rating)
    {
        $this->authorize('author', User::find($user->id));

        $peli = Pelicula::find($peli_id);

        $review_collect = new stdClass();
        $review_collect->pivot = new stdClass();
        $review_collect->pivot->review =$review;
        $review_collect->pivot->rating =$rating;
        $review_collect->pivot->updated_at = now();
        $review_collect->name =$peli->peli_title;

        Mail::to($user->email)->send(new MailablePersonalizado($peli->peli_title, $user->name, $review_collect));

        return redirect()->route('peliculas.show', $peli_id);
    }
}
