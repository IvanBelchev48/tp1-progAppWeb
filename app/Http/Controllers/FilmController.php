<?php

namespace App\Http\Controllers;

use App\Film;
use App\Actor;
use App\Http\Resources\FilmResource;
use App\Http\Requests\FilmRequest;

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
    public function store(FilmRequest $request)
    {
        $film = Film::create($request->all());
        return response()->json($film, 201);
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
    public function showFilmWithActors(Film $film)
    {
        $film = Film::with('actors')->findOrFail($film->id);
        return $film;
    }

    public function showFilmWithCritics(Film $film)
    {
        $film = Film::with('critics')->findOrFail($film->id);
        return $film;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, Film $film)
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
