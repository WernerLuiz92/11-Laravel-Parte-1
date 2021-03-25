<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Home@index')
    ->name('home.index');

Route::get('/series', 'App\Http\Controllers\SeriesController@index')
    ->name('series.index');

Route::get('/series/create', 'App\Http\Controllers\SeriesController@create')
    ->name('series.create');

Route::get('/series/{id}/seasons', 'App\Http\Controllers\SeasonsController@index')
    ->name('seasons.index');

Route::get('/seasons/{id}/episodes', 'App\Http\Controllers\EpisodesController@index')
    ->name('episodes.index');

Route::post('/series/{id}', 'App\Http\Controllers\SeriesController@store')
    ->name('series.store');

Route::post('/series/{id}/titleUpdate', 'App\Http\Controllers\SeriesController@titleUpdate');

Route::delete('/series/{id}', 'App\Http\Controllers\SeriesController@destroy')
    ->name('series.destroy');

Route::put('/series/{id}', 'App\Http\Controllers\SeriesController@update')
    ->name('series.update');
