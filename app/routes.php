<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', 'uses' => 'MainPageController@index']);

Route::post('auth', ['as' => 'auth', 'uses' => 'AuthController@auth']);

Route::get('entries/{slug}',['as' => 'entries.show', 'uses' => 'EntriesController@show']);
Route::resource('entries', 'EntriesController', ['except' => 'show', 'index']);

Route::get('users/{slug}',['as' => 'users.show', 'uses' => 'UsersController@show']);
Route::get('users/register',['as' => 'users.create', 'uses' => 'UsersController@create']);
Route::get('users/password-remainder',['as' => 'users.password.remainder', 'uses' => 'UsersController@passwordRemainder']);
Route::post('password-remainder',['as' => 'send.new.password', 'uses' => 'UsersController@sendNewPassword']);
Route::resource('users', 'UsersController', ['except' => 'show', 'index', 'create']);

