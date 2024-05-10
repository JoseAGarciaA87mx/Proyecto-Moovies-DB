<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::get(['id', 'dir_name', 'dir_country']);

        return view('admin.directors.index', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.directors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'name'=>'required|max:100',
            'country'=>'required|max:100',
            'birthdate'=>'required|date|before_or_equal:today'
        ]);

        if($validator->fails()){  // si se falla una regla de validación se retorna al formulario con los errores
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $new_director = new Director();

        $new_director->dir_name = $request->input('name');
        $new_director->dir_country = $request->input('country');
        $new_director->dir_birthdate = $request->input('birthdate');

        $new_director->save();

        $director = $new_director;

        //return redirect()->back();
        return redirect()->route('directors.show', $director->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $director = Director::withCount('peliculas')->find($id);
        return view('admin.directors.show', compact('director'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        $title = "Administra el Director";
        return view('admin.directors.manage',compact('director', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        $validator = FacadesValidator::make($request->all(), [
            'name'=>'required|max:100',
            'country'=>'required|max:100',
            'birthdate'=>'required|date|before_or_equal:today'
        ]);

        if($validator->fails()){  // si se falla una regla de validación se retorna al formulario con los errores
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $director->dir_name = $request->input('name');
        $director->dir_country = $request->input('country');
        $director->dir_birthdate = $request->input('birthdate');

        $director->save();

        return redirect()->route('directors.show', $director->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        $director->delete();
        return redirect()->route('directors.index');
    }
}
