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
Route::get('/','AuthController@login')->name('login')->middleware('guest');
Route::post('/login','AuthController@processLogin')->name('login.submit');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard','AuthController@dashboard')->name('dashboard');
    Route::get('/logout','AuthController@logout')->name('logout');
    Route::get('/home','AuthController@home')->name('home')->middleware('role');
    Route::group(['prefix'=>'role'],function(){
        Route::get('/','RoleController@index')->name('role.index');
        Route::post('/','RoleController@store')->name('role.store');
        Route::get('/create','RoleController@create')->name('role.create');
        Route::get('/{id}','RoleController@show')->name('role.show');
        Route::put('/{id}','RoleController@update')->name('role.update');
        Route::get('/edit/{id}','RoleController@edit')->name('role.edit');
        Route::post('/store/ajax','RoleController@storeajax')->name('role.store.ajax');
        Route::get('/exist','RoleController@exist')->name('role.exist');

    });
    Route::group(['prefix'=>'permissions'],function(){
        Route::get('/','PermissionController@index')->name('permissions.index');
        Route::post('/','PermissionController@store')->name('permissions.store');
        Route::get('/create','PermissionController@create')->name('permissions.create');
        Route::get('/show','PermissionController@show')->name('permissions.show');
        Route::get('/role/{id}','PermissionController@PermissionRole')->name('permissions.role');
        Route::get('/add/role/{id}','PermissionController@PermissionRoleAdd')->name('permissions.role.add');

    });
});


