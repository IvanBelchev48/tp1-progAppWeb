<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FilmResource::collection(Film::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$donnees = $request->all();

        // $unFilm = Film::create([
        //   'title' => $donnees['title'],
        //   'release_year' => $donnees['release_year'],
        //   'length' => $donnees['length'],
        //   'description' => $donnees['description'],
        //   'rating' => $donnees['rating'],
        //   'language_id' => $donnees['language_id'],
        //   'special_features' => $donnees['special_features']
        //   'image' => $donnees['image']
        //   'created_at' => $donnees['created_at']
        //  ]);

        $film = Film::create($request->all());
        return response()->json($film, 201);
        //return $film;

    }

    /**
     * Display the specified resource.
     *
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return $film;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $film->update($request->all());
        return response()->json($film, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function delete(Film $film)
    {
        $film->delete();
        return response()->json(null, 204);
    }
}
