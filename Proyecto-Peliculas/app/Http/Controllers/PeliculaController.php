<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::get(['id','peli_title', 'peli_genre', 'peli_year', 'peli_length']);

        return view('admin.peliculas.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* poner en la view: admin.peliculas.edit y admin.peliculas.manage
                <div class = "dropdown">
                    <label for="director_id">Director</label>
                        <select name="director_id" id="director_id">
                             @foreach ($directors as $director)
                                <option value="{{$director->id}}">{{$director->dir_name}}</option>
                             @endforeach
                        </select><br>
                </div> */
        //$directores = Director::get();
        return view('admin.peliculas.create',/*compact('directores')*/);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validator = FacadesValidator::make($request->all(), [
            'title'=>'required|max:100',
            'studio'=>'required|max:100',
            'length'=>'required|integer',
            'genre'=>'required|max:100',
            'year'=>'required|integer|min:1900|max:2100',
            'country'=>'required|max:100',
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

        $new_movie->save();

        $pelicula = $new_movie;

        //return redirect()->back();
        return view('admin.peliculas.show', compact('pelicula'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);
        return view('admin.peliculas.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        $title = "Administra la Película";
        return view('admin.peliculas.manage',compact('pelicula', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $validator=FacadesValidator::make($request->all(), [
            'title'=>'required|max:255',
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

        $pelicula->save();

        return view('admin.peliculas.show', compact('pelicula'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect()->route('peliculas.index');
    }
}
