<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Pelicula;
use App\Models\PeliculaUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\MagicConst\Dir;

use function PHPUnit\Framework\isEmpty;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::get(['id','peli_title', 'peli_genre', 'peli_year', 'peli_length', 'image_url']);

        foreach($peliculas as $pelicula){
            if($pelicula->image_url!=null){
                $pelicula->image_url = 'storage/miniposters'.substr($pelicula->image_url, 16);
            } else {
                $pelicula->image_url = 'storage/miniposters/HTTvejiPAfHYp81ECgiM3VVBvzkh2NVwWIvcuqoQ.jpg';
            }
        }

        return view('admin.peliculas.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //coloca al director desconocido al inicio
        $directors = Director::find(1);
        $directors = collect([$directors])
            ->concat(Director::where('id', '!=', 1)->orderBy('dir_name', 'ASC')->get(['id', 'dir_name']));

        return view('admin.peliculas.create',compact('directors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validator = FacadesValidator::make($request->all(), [
            'title'=>'required|max:100',
            'director'=>'required|integer|min:1',
            'studio'=>'required|max:100',
            'length'=>'required|integer',
            'genre'=>'required|max:100',
            'year'=>'required|integer|min:1900|max:2100',
            'country'=>'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10000' // Máximo 25 Megas, no oblugatorio
        ]);

        if($validator->fails()){  // si se falla una regla de validación se retorna al formulario con los errores
            return redirect()->back()->withErrors($validator)->withInput();
        }
        

        $new_movie = new Pelicula();

        $new_movie->peli_title = $request->input('title');
        $new_movie->peli_studio = $request->input('studio');
        $new_movie->peli_length = $request->input('length');
        $new_movie->peli_genre = $request->input('genre');
        $new_movie->peli_year = $request->input('year');
        $new_movie->peli_country = $request->input('country');
        
        $new_movie->director_id = $request->input('director');

        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('public/posters');
            $url = Storage::url($image_path);
            $new_movie->image_url = $url;

            //crear el mini con php gd 
            $extension = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
            $mini_url = 'storage/miniposters'.substr($url, 16);
            $imagen_original = null;

            if ($extension === 'jpg' || $extension === 'jpeg') {
                $imagen_original = imagecreatefromjpeg(public_path($url));

            } elseif ($extension === 'png') {
                $imagen_original = imagecreatefrompng(public_path($url));

            }

            $ancho_original = imagesx($imagen_original);
            $alto_original = imagesy($imagen_original);

            $nuevo_ancho = intval($ancho_original * 0.20);
            $nuevo_alto = intval($alto_original * 0.20);

            $nueva_imagen = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

            imagecopyresampled($nueva_imagen, $imagen_original, 0, 0, 0, 0, 
                $nuevo_ancho, $nuevo_alto, 
                $ancho_original, $alto_original);

            imagejpeg($nueva_imagen, $mini_url);

            imagedestroy($nueva_imagen);
            imagedestroy($imagen_original);
        }

        $new_movie->save();

        $pelicula_id = $new_movie->id;

        //return redirect()->back();
        return redirect()->route('peliculas.show', $pelicula_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    { 
        $pelicula = Pelicula::with('director')->findOrFail($id);
        $userReview = null;
        $logged_user_id =  Auth::id();

        if($pelicula->image_url == null){
            $pelicula->image_url = 'storage/posters/HTTvejiPAfHYp81ECgiM3VVBvzkh2NVwWIvcuqoQ.jpg';
        }

        $reviews = $pelicula->users()->withPivot('rating', 'review', 'updated_at')
            ->orderBy('pivot_rating', 'desc')->get();     

        if($reviews->isEmpty()){
            $reviews = null;

        } else {
            $collection_index = 0;
            foreach($reviews as $review){
                if($review->id == $logged_user_id){
                    $userReview = $review;

                    $reviews->forget($collection_index);

                    break;
                }
                $collection_index ++;
            }
        }

        return view('admin.peliculas.show', compact('pelicula','reviews', 'userReview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        $directors=null;
        $other_directors = Director::where('id', '!=', 1)->where('id', '!=', $pelicula->director->id)->orderBy('dir_name', 'ASC')->get(['id', 'dir_name']);
        
        if($pelicula->director->id != 1){
            $directors = Director::find(1);
            $directors = collect([$directors])->concat($other_directors);
        }else{
            $directors = $other_directors;
        }

        $title = "Administra la Película";
        return view('admin.peliculas.manage',compact('pelicula', 'directors', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $validator=FacadesValidator::make($request->all(), [
            'title'=>'required|max:255',
            'director'=>'required|integer|min:1',
            'studio'=>'required|max:255',
            'length'=>'required|integer',
            'genre'=>'required|max:255',
            'year'=>'required|integer|min:1900|max:2100',
            'country'=>'required|max:100',
        ]);

        if($validator->fails()){  // si se falla una regla de validación se retorna al formulario con los errores
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pelicula->peli_title = $request->input('title');
        $pelicula->peli_studio = $request->input('studio');
        $pelicula->peli_length = $request->input('length');
        $pelicula->peli_genre = $request->input('genre');
        $pelicula->peli_year = $request->input('year');
        $pelicula->peli_country = $request->input('country');

        $pelicula->director_id = $request->input('director');

        $pelicula->save();

        return view('admin.peliculas.show', compact('pelicula'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        $url = $pelicula->image_url;
        if($url != null){
            $mini_url = 'storage/miniposters'.substr($url, 16);
            if(Storage::disk('public')->exists($mini_url)){
                Storage::disk('public')->delete($mini_url);
            }
            
            if (Storage::disk('public')->exists($url)) {
                Storage::disk('public')->delete($url);                
            }
        }

        $pelicula->delete();
        return redirect()->route('peliculas.index');
    }

    public function store_comment(Request $request, $pelicula_id){
        $validator = FacadesValidator::make($request->all(), [
            'rating'=>'required|min:0|max:100',
            'review'=>'required|max:255'
        ]);

        if($validator->fails()){  // si se falla una regla de validación se retorna al formulario con los errores
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::id());

        $user->peliculas()->attach($pelicula_id, [
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('peliculas.show', $pelicula_id);
    }

    public function update_comment(Request $request, $pelicula_id){
        $validator = FacadesValidator::make($request->all(), [
            'rating'=>'required|min:0|max:100',
            'review'=>'required|max:255'
        ]);

        if($validator->fails()){  // si se falla una regla de validación se retorna al formulario con los errores
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::id());

        $user->peliculas()->updateExistingPivot($pelicula_id, [
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
            'updated_at' => now(),
        ]);

        return redirect()->route('peliculas.show', $pelicula_id);
    }

    public function delete_comment($pelicula_id){

        $user = User::find(Auth::id());

        $user->peliculas()->detach($pelicula_id);

        return redirect()->route('peliculas.show', $pelicula_id);
    }
}
