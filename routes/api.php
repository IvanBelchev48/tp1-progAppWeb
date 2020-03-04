<?php

use Illuminate\Http\Request;

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

/*Route::get('films', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Film::all();
});

Route::get('films/{id}', function($id) {
    return Film::find($id);
});

Route::post('films', function(Request $request) {
    return Film::create($request->all);
});

Route::put('films/{id}', function(Request $request, $id) {
    $film = Film::findOrFail($id);
    $film->update($request->all());

    return $film;
});

Route::delete('films/{id}', function($id) {
    Film::find($id)->delete();

    return 204;
});*/

Route::get('films', 'FilmController@index');
Route::get('films/{film}', 'FilmController@show');
Route::post('films', 'FilmController@store');
Route::put('films/{film}', 'FilmController@update');
Route::delete('films/{film}', 'FilmController@delete');
