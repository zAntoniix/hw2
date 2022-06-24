<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;
use App\Models\User;

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

Route::get('/', function() {
  $error = false;
  return view('login')->with('error', $error);
});

Route::get('/signup', 'App\Http\Controllers\SignupController@index');
Route::post('/signup', 'App\Http\Controllers\SignupController@signup');
Route::get('/signup/username/{username}', 'App\Http\Controllers\SignupController@checkUsername');
Route::get('/signup/email/{email}', 'App\Http\Controllers\SignupController@checkEmail');

Route::get('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/login', 'App\Http\Controllers\LoginController@checkLogin');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/contents', 'App\Http\Controllers\HomeController@getContents');
Route::get('/inevidenza', 'App\Http\Controllers\HomeController@getEvidenza');
Route::post('/home/addtopref', 'App\Http\Controllers\PreferitiController@addPref');
Route::post('/home/addtoplay', 'App\Http\Controllers\PlaylistController@addSong');

Route::get('/ricerca', 'App\Http\Controllers\RicercaController@index');
Route::get('/ricerca/search/{q}', 'App\Http\Controllers\RicercaController@cerca');
Route::post('/ricerca/addtopref', 'App\Http\Controllers\PreferitiController@addPref');
Route::post('/ricerca/addtoplay', 'App\Http\Controllers\PlaylistController@addSong');
Route::post('/ricerca/search/prev', 'App\Http\Controllers\RicercaController@prevNext');
Route::post('/ricerca/search/next', 'App\Http\Controllers\RicercaController@prevNext');

Route::get('/preferiti', 'App\Http\Controllers\PreferitiController@index');
Route::get('/preferiti/prefs', 'App\Http\Controllers\PreferitiController@getPrefs');
Route::post('/preferiti/remove', 'App\Http\Controllers\PreferitiController@removePrefs');

Route::get('/myplaylist', 'App\Http\Controllers\PlaylistController@index');
Route::get('/playlist/getplay', 'App\Http\Controllers\PlaylistController@getPlaylist');
Route::post('/playlist/remove', 'App\Http\Controllers\PlaylistController@removeSong');