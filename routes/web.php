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

Route::redirect('/', '/home');

Route::auth();
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@store');

Route::get('/deposits', 'DepositController@index')->name('deposit.index');
Route::get('/deposits/to-accept', 'DepositController@toAccept')->name('deposit.to-accept');
Route::put('/deposits/to-accept', 'DepositController@toAcceptProcess');

Route::get('/user', 'UserController@list')->name('user.list');
Route::get('/user/{user}', 'UserController@profile')->name('user.profile');
