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
    return view('auth.login');
});

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/ellk', 'ellkController@index')->name('ellk');
Route::post('/ellk/create', 'ellkController@create')->name('ellk.create');

Route::get('/users', 'UserController@getAllUser')->name('users');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//users data
Route::prefix('users')->group(function(){
    Route::post('/add', 'UserController@store')->middleware('auth')->name('users.add');
});
