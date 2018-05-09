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

Route::view('/', 'welcome');

Auth::routes();

Route::middleware('auth')->group(function() {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('games/{game}/next', 'GamesController@next')->name('games.next');
	Route::post('games/start', 'GamesController@start')->name('games.start');
	Route::resource('games', 'GamesController');
	
	Route::resource('games/{game}/plots', 'PlotsController');
	
	Route::resource('characters', 'CharactersController');
	Route::get('games/{game}/character/create', 'CharactersController@create')->name('characters.create');
	
});

Route::get('classes', function() {
	return \App\Models\Classes::all();
});

Route::get('races', function() {
	return \App\Models\Race::all();
});

Route::get('armors', function() {
	return \App\Models\ArmourClass::all();
});
