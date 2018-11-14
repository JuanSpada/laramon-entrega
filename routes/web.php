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

Route::get('/', 'WebController@inicio')->name('inicio');

Route::prefix('pokemon')->name('pokemon.')->group(function () {
    Route::get('/','PokemonController@todos')->name('todos');
    Route::get('/nuevo','PokemonController@nuevo')->name('nuevo');
    Route::post('/','PokemonController@guardar')->name('guardar');
    Route::get('/{pokemon}','PokemonController@uno')->name('uno');
    Route::get('/{pokemon}/editar','PokemonController@editar')->name('editar');
    Route::put('/{pokemon}/editar', 'PokemonController@actualizar')->name('actualizar');
    Route::delete('/{pokemon}', 'PokemonController@borrar')->name('borrar');
});

Route::get('/type','TypeController@todos')->name('tipos');
Route::get('/type/{tipo}', 'TypeController@uno')->name('tipo');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
