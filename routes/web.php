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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/api/users','UserAPIController@index')->name('users');
Route::post('/api/user_store','UserAPIController@store')->name('user.store');
Route::post('/api/user_update/{id}','UserAPIController@update')->name('user.update');
Route::post('/api/user_delete/{id}','UserAPIController@destroy')->name('user.delete');

