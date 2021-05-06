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
Route::get('/', 'App\Http\Controllers\WelcomeController@index');

Route::get('/sneaker/{id}', 'App\Http\Controllers\SneakerController@index');

Route::post('/sneaker/{modele}/color', 'App\Http\Controllers\SneakerController@index');

Route::get('/catalogue', 'App\Http\Controllers\CatalogueController@index');

Route::get('/catalogue/{filter}', 'App\Http\Controllers\CatalogueController@filter');

Route::post('/search', 'App\Http\Controllers\CatalogueController@search');
Route::get('/search', 'App\Http\Controllers\CatalogueController@search');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/admin/sneakers', 'App\Http\Controllers\HomeController@sneakers')->middleware(['auth']);

Route::get('/admin/marques', 'App\Http\Controllers\HomeController@marques')->middleware(['auth']);

Route::get('/addBestseller/{id}', 'App\Http\Controllers\HomeController@bestseller')->middleware(['auth']);

Route::get('/admin/modeles', 'App\Http\Controllers\HomeController@modeles')->middleware(['auth']);

Route::get('/404', 'App\Http\Controllers\NopeController@index');

Route::get('/add/sneaker', 'App\Http\Controllers\SneakerController@create')->middleware(['auth']);

Route::post('/add/sneaker', 'App\Http\Controllers\SneakerController@store')->middleware(['auth']);

Route::get('/add/modele', 'App\Http\Controllers\ModeleController@create')->middleware(['auth']);

Route::post('/add/modele', 'App\Http\Controllers\ModeleController@store')->middleware(['auth']);

Route::get('/add/marque', 'App\Http\Controllers\MarqueController@create')->middleware(['auth']);

Route::post('/add/marque', 'App\Http\Controllers\MarqueController@store')->middleware(['auth']);


Route::get('/update/sneaker/{id}', 'App\Http\Controllers\SneakerController@edit')->middleware(['auth']);

Route::post('/update/sneaker/{id}', 'App\Http\Controllers\SneakerController@update')->middleware(['auth']);

Route::get('/update/modele/{id}', 'App\Http\Controllers\ModeleController@edit')->middleware(['auth']);

Route::post('/update/modele/{id}', 'App\Http\Controllers\ModeleController@update')->middleware(['auth']);

Route::get('/update/marque/{id}', 'App\Http\Controllers\MarqueController@edit')->middleware(['auth']);

Route::post('/update/marque/{id}', 'App\Http\Controllers\MarqueController@update')->middleware(['auth']);

Route::get('/delete/marque/{id}', 'App\Http\Controllers\MarqueController@destroy')->middleware(['auth']);
Route::get('/delete/modele/{id}', 'App\Http\Controllers\ModeleController@destroy')->middleware(['auth']);
Route::get('/delete/sneaker/{id}', 'App\Http\Controllers\SneakerController@destroy')->middleware(['auth']);

Route::auth();
