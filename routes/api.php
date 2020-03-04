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

//Actors Routes -----------------------------------------------------------

Route::get('actors', 'ActorController@index');
Route::get('actors/{actor}', 'ActorController@show');
Route::post('actors', 'ActorController@store');
Route::put('actors/{actor}', 'ActorController@update');
Route::delete('actors/{actor}', 'ActorController@delete');

//Critics Routes -----------------------------------------------------------

Route::get('critics', 'CriticController@index');
Route::get('critics/{critic}', 'CriticController@show');
Route::post('critics', 'CriticController@store');
Route::put('critics/{critic}', 'CriticController@update');
Route::delete('critics/{critic}', 'CriticController@delete');

//Films Routes -----------------------------------------------------------

Route::get('films', 'FilmController@index');
Route::get('films/{film}', 'FilmController@show');
Route::post('films', 'FilmController@store');
Route::put('films/{film}', 'FilmController@update');
Route::delete('films/{film}', 'FilmController@delete');