<?php

use Illuminate\Http\Request;
use App\Actor;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Actors Routes -----------------------------------------------------------
/*Route::get('actors', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Actor::all();
});
 
Route::get('actors/{id}', function($id) {
    return Actor::find($id);
});

Route::post('actors', function(Request $request) {
    return Actor::create($request->all);
});

Route::put('actors/{id}', function(Request $request, $id) {
    $actor = Actor::findOrFail($id);
    $actor->update($request->all());

    return $actor;
});

Route::delete('actors/{id}', function($id) {
    Actor::find($id)->delete();

    return 204;
});*/

Route::get('actors', 'ActorController@index');
Route::get('actors/{actor}', 'ActorController@show');
Route::post('actors', 'ActorController@store');
Route::put('articles/{actor}', 'ActorController@update');
Route::delete('articles/{actor}', 'ActorController@delete');

//---------------------------------------------------------------

//Critics Routes -----------------------------------------------------------
/*Route::get('critics', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Critic::all();
});
 
Route::get('critics/{id}', function($id) {
    return Critic::find($id);
});

Route::post('critics', function(Request $request) {
    return Critic::create($request->all);
});

Route::put('critics/{id}', function(Request $request, $id) {
    $critic = Critic::findOrFail($id);
    $critic->update($request->all());

    return $critic;
});

Route::delete('critics/{id}', function($id) {
    Actor::find($id)->delete();

    return 204;
});*/

Route::get('critics', 'CriticController@index');
Route::get('critics/{critic}', 'CriticController@show');
Route::post('critics', 'CriticController@store');
Route::put('critics/{ctitic}', 'CriticController@update');
Route::delete('critics/{critic}', 'CriticController@delete');

//---------------------------------------------------------------