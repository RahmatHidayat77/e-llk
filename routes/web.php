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
Route::get('/users', 'UserController@getAllUser')->name('users');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/submited', 'ellkSubmitController@index')->middleware('auth')->name('ellk-submitted');
Route::post('/submited/update/{id}', 'ellkSubmitController@update')->middleware('auth');

//ellk data
Route::prefix('ellk')->group(function(){
    Route::get('/', 'ellkController@index')->middleware('auth')->name('ellk');
    Route::post('/add', 'ellkController@store')->middleware('auth')->name('ellk.add');
    Route::get('/delete/{id}', 'ellkController@destroy')->middleware('auth');
    Route::get('/detail/{id}','ellkController@detail')->middleware('auth');
    Route::post('/update/{id}', 'ellkController@update')->middleware('auth');
});

//users data
Route::prefix('users')->group(function(){
    Route::post('/add', 'UserController@store')->middleware('auth')->name('users.add');
    Route::get('/delete/{id}', 'UserController@destroy')->middleware('auth');
    Route::get('/detail/{id}','UserController@detail')->middleware('auth');
    Route::post('/update/{id}', 'UserController@update')->middleware('auth');
});
