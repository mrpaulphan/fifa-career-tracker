<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@getIndex')->name('show.landing');
Auth::routes();
Route::get('{username}/saves', 'PagesController@getSaves')->name('show.saves');
Route::post('{username}/saves/create', 'SavesController@store')->name('post.saves');
Route::put('{username}/saves/edit', 'SavesController@edit')->name('update.saves');
Route::delete('{username}/saves/delete', 'SavesController@delete')->name('delete.saves');

// Season
Route::get('{username}/{slug}/season', 'PagesController@getSeasons')->name('show.seasons');
Route::post('{username}/{slug}/season/create', 'SeasonController@store')->name('store.team');
Route::put('{username}/{slug}/season/update', 'SeasonController@update')->name('update.seasons');


// Players
Route::post('{username}/{slug}/player/create', 'PlayerController@store')->name('store.players');


Route::get('/styleguide', 'PagesController@getStyleGuide')->name('show.styleguide');
