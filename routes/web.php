<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


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


Auth::routes();

Route::get('/', 'HomeController@home')->name('home');

// SINGOLO PILOTA
Route::get('/pilots/{pilot}', 'HomeController@pilot') -> name('pilot');

// CREA SINGOLA MACCHINA
Route::get('create', 'MainController@create') -> name('create');
Route::post('store', 'MainController@store') -> name('store');

// EDIT SINGOLA MACCHINA
Route::get('edit/car/{id}', 'MainController@edit')-> name('edit');
Route::post('update/car/{id}', 'MainController@update')-> name('update');

// DELETE SINGOLA MACCHINA
Route::get('/destroy/{id}', 'MainController@destroy') -> name('destroy');
