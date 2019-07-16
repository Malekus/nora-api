<?php

Route::get('configurations', 'ConfigurationController@index')
    ->name('index');
Route::get('configuration/{id}', 'ConfigurationController@show')
    ->name('show');
Route::post('configuration', 'ConfigurationController@store')
    ->name('store');
Route::put('configuration/{id}', 'ConfigurationController@store')
    ->name('store');
Route::delete('configuration/{id}', 'ConfigurationController@destroy')
    ->name('destroy');

Route::get('categories', 'CategorieController@index')
    ->name('index');
Route::get('categorie/{id}', 'CategorieController@show')
    ->name('show');
Route::post('categorie', 'CategorieController@store')
    ->name('store');
Route::put('categorie/{id}', 'CategorieController@store')
    ->name('store');
Route::delete('categorie/{id}', 'CategorieController@destroy')
    ->name('destroy');

Route::get('types', 'TypeController@index')
    ->name('index');
Route::get('type/{id}', 'TypeController@show')
    ->name('show');
Route::post('type', 'TypeController@store')
    ->name('store');
Route::put('type/{id}', 'TypeController@store')
    ->name('store');
Route::delete('type/{id}', 'TypeController@destroy')
    ->name('destroy');

Route::get('phrases', 'PhraseController@index')
    ->name('index');
Route::get('phrase/{id}', 'PhraseController@show')
    ->name('show');
Route::post('phrase', 'PhraseController@store')
    ->name('store');
Route::put('phrase/{id}', 'PhraseController@store')
    ->name('store');
Route::delete('phrase/{id}', 'PhraseController@destroy')
    ->name('destroy');
