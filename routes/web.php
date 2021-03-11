<?php

use App\Http\Middleware\FlashMessage;
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

Route::get('/', function () {
    FlashMessage::setFlashMessage('danger', 'Olá, deu certo', true);

    return view('home');
});

Route::get('/series', 'App\Http\Controllers\SeriesController@index');

Route::get('/series/create', 'App\Http\Controllers\SeriesController@create');

Route::post('/series/create', 'App\Http\Controllers\SeriesController@store');
