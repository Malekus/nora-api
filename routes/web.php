<?php

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
    return view('welcome');
});

Route::get('/', 'HomeController@index')
    ->name('home.index');

Route::get('/phrase/{id}', 'HomeController@getPhrase')
    ->name('home.getPhrase');

Route::get('/addCategorie/{categorie}', 'HomeController@addCategorie')
    ->name('home.addCategorie');

Route::get('/deleteCategorie/{categorie}', 'HomeController@deleteCategorie')
    ->name('home.deleteCategorie');

Route::get('/editCategorie/{id}/{categorie}', 'HomeController@editCategorie')
    ->name('home.editCategorie');
