<?php

use Illuminate\Http\Request;
use App\Actor;
use App\Film;

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

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function() {
    /* Actor */
    Route::post('actors', 'ActorController@store');
    Route::put('actors/{actor}', 'ActorController@update');
    Route::delete('actors/{actor}', 'ActorController@delete');
    /* Critics */
    Route::post('critics', 'CriticController@store');
    Route::put('critics/{critic}', 'CriticController@update');
    Route::delete('critics/{critic}', 'CriticController@delete');
    /* Films */
    Route::post('films', 'FilmController@store');
    Route::put('films/{film}', 'FilmController@update');
    Route::delete('films/{film}', 'FilmController@delete');
    /* User */
    Route::put('users/user', 'UserController@store');
    Route::get('userDetails', 'UserController@userDetails');
    Route::put('settings/user', 'UserController@updateInfo');
});

/* Actors Routes */
Route::get('actors', 'ActorController@index');
Route::get('actors/{actor}', 'ActorController@show');

/* Critics Routes */
Route::get('critics', 'CriticController@index');
Route::get('critics/{critic}', 'CriticController@show');

/* Films Routes */
Route::get('films', 'FilmController@index');
Route::get('films/{film}', 'FilmController@show');
Route::get('films/keyword/{keyword}', 'FilmController@browseFilms');
Route::get('films/rating/{rating}', 'FilmController@browseFilms');
Route::get('films/minLength/{length}', 'FilmController@browseFilms');
Route::get('films/maxLength/{length}', 'FilmController@browseFilms');

Route::get('films/{film}/actors', 'FilmController@showFilmWithActors');
Route::get('films/{film}/critics', 'FilmController@showFilmWithCritics');
