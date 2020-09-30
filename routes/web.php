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

// Auth
Route::get('login','AuthController@login')->middleware('guest')->name('login');
Route::post('login', 'AuthController@postLogin')->middleware('guest')->name('post-login');
Route::get('/logout','AuthController@logout')->middleware('auth')->name('logout');

Route::get('dashboard','PageController@dashboard')->middleware('auth')->name('dashboard');
