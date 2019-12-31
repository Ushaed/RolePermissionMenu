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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@processLogin')->name('login.submit');
Route::get('/dashboard','AuthController@dashboard')->name('dashboard');
Route::get('/home','AuthController@home')->name('home')->middleware('role');
