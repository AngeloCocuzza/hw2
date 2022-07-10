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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'App\Http\Controllers\LoginController@login')->name("login");
Route::get("/logout", "App\Http\Controllers\LoginController@logout")->name("logout");
Route::post("/login", 'App\Http\Controllers\LoginController@checklogin');

Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name("register");
Route::post('/register', 'App\Http\Controllers\RegisterController@signup');
Route::get('/register/email/{query}', "App\Http\Controllers\RegisterController@checkEmail");

Route::get('/load', "App\Http\Controllers\LoadController@index")->name('load');
Route::get('/load/weather/{query}', 'App\Http\Controllers\LoadController@weather');

Route::get('/carrello','App\Http\Controllers\CarrelloController@index')->name('carrello');
Route::get('/carrello/{query}','App\Http\Controllers\CarrelloController@item');

Route::get('/pacchetti', 'App\Http\Controllers\PacchettiController@index')->name('pacchetti');
Route::get('/pacchetti/load/{query}', 'App\Http\Controllers\PacchettiController@load');
Route::get('/pacchetti/loadcart', 'App\Http\Controllers\PacchettiController@loadcart');


Route::get('/pacchetti/add/{query}', 'App\Http\Controllers\ItemController@add');
Route::get('/carrello/remove/{query}', 'App\Http\Controllers\ItemController@remove');

Route::get('/recensioni', 'App\Http\Controllers\RecensioniController@index')->name('recensioni');

Route::post('/recensioni/new','App\Http\Controllers\RecensioniController@new')->name("new");
Route::get('/recensioni/load','App\Http\Controllers\RecensioniController@load');


Route::get('/home',"App\Http\Controllers\HomeController@index")->name('home');
