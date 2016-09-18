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
Route::post('{username}/{slug}/season', 'PagesController@getSeasons')->name('post.seasons');
Route::post('{username}/{slug}/season/create', 'SeasonController@store')->name('store.team');



Route::get('/season/create', 'TeamController@create')->name('create.team');
Route::put('/season', 'TeamController@edit')->name('edit.team');

Route::get('/team', 'PagesController@getPlayers')->name('show.players');
Route::get('/transfer', 'PagesController@getTransfers')->name('show.transfers');
Route::get('/youth', 'PagesController@getYouth')->name('show.youth');
Route::get('/career', 'PagesController@getCareers')->name('show.careers');
Route::get('/teamselect', 'PagesController@getTeamSelect')->name('show.teamselect');


Route::get('/team/create', 'PlayerController@getIndex')->name('create.player');
Route::post('/team/create', 'PlayerController@store')->name('post.player');
Route::post('/team/delete', 'PlayerController@destroy')->name('delete.player');

Route::get('/transfers', 'PagesController@getTransfers');
Route::get('/styleguide', 'PagesController@getStyleGuide')->name('show.styleguide');
