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
Route::get('/','App\Http\Controllers\WelcomeController@index');

Route::get('/sneaker/{id}', 'App\Http\Controllers\SneakerController@index');

Route::post('/sneaker/color', 'App\Http\Controllers\SneakerController@color');

Route::get('/catalogue', 'App\Http\Controllers\CatalogueController@index');

Route::get('/catalogue/{filter}', 'App\Http\Controllers\CatalogueController@filter');

Route::auth();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/add/sneaker', 'App\Http\Controllers\SneakerController@create')->middleware(['auth']);
Route::post('/add/sneaker', 'App\Http\Controllers\SneakerController@store')->middleware(['auth']);

Route::get('/add/modele', 'App\Http\Controllers\ModeleController@create')->middleware(['auth']);

Route::post('/add/modele', 'App\Http\Controllers\ModeleController@store')->middleware(['auth']);

Route::get('/add/marque', 'App\Http\Controllers\MarqueController@create')->middleware(['auth']);

Route::post('/add/marque', 'App\Http\Controllers\MarqueController@store')->middleware(['auth']);
