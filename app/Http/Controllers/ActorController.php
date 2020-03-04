<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;

use App\Actor;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Actor::all();
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
    public function store(ActorRequest $request)
    {
        $actor = Actor::create($request->all());

        return response()->json($actor, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        return $actor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit($actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(ActorRequest $request, Actor $actor)
    {
        $actor->update($request->all());

        return response()->json($actor, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function delete(Actor $actor)
    {
        $actor->delete();

        return response()->json(null, 204);
    }
}
