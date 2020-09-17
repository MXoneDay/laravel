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

//Route voor de welcome pagina (Hoofdpagina)
//De Functie bevind zich in de PagesController (app->http->controllers->...)
Route::get('/', 'PagesController@index');
//Route voor de regels pagina
Route::get('/regels', 'PagesController@regels');
//Route voor de kalender pagina
Route::get('/kalender', 'PagesController@kalender');
//Route voor de uitslagen pagina
Route::get('/uitslagen', 'PagesController@uitslagen');
//Route voor de drivers pagina
Route::get('/drivers', 'PagesController@drivers');
//Route voor de drivers pagina
Route::get('/FIA', 'PagesController@fia');

// Video voor dynamic pages https://www.youtube.com/watch?v=sLFNVXY0APk&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-&index=3

Route::resource('races', 'RacesController');
Route::resource('results', 'ResultsController');
Route::resource('driver_profile', 'DriversController');
