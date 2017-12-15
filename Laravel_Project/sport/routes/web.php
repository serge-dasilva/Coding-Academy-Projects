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

//use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/teams/{id}', 'TeamsController@show')->name('teamShow');
Route::get('/teams', 'TeamsController@index')->name('teams');

Route::get('/players', 'PlayersController@index')->name('players');

Route::get('/players-admin', 'PlayersController@indexAdmin')->name('players-admin')->middleware('isadmin');

Route::post('/players-admin', 'PlayersController@add');

Route::get('/players-admin/edit-player/{id?}', 'PlayersController@edit')->name('edit-player');
Route::post('players-admin/edit-player/{id?}', 'PlayersController@update');

Route::get('/players-destroy/{id?}', 'PlayersController@destroy')->name('destroy-player');

Route::get('players/select-player/{id?}', 'PlayerStatsController@selectPlayer')->name('select-player');

Route::get('/matches', 'MatchesController@index')->name('matches');
Route::post('/matches', 'MatchesController@create')->name('createMatches');

Route::get('/matches/del/{id}', 'MatchesController@delete')->name('delmatches');

Route::get('/matches/setresults/{id}', 'MatchesController@setresults')->name('setresults');

Route::post('/matches/setresults/{id}', 'MatchesController@confirmresults')->name('confresults');

Route::get('/matches/{id}', 'MatchesController@results')->name('results');
