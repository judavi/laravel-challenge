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
Route::get('entries/{slug}', ['as' => 'entries.show', 'uses' => 'EntriesController@show']);
Route::get('users/{slug}', ['as' => 'users.show', 'uses' => 'UsersController@show']);

//Twitter api Routes
Route::get('users/{twitter_account}/twitter-timeline', ['as' => 'user.twitter.timeline', 'uses' => 'UsersController@twitterTimeline']);
Route::get('twitter/callback', ['as' => 'twitter_callback', 'uses' => 'TweetsController@twitterCallback']);
Route::post('is-tweet-hide/{tweet_id}/{twitter_account}', 'TweetsController@IsTweetHide');
Route::post('hide-tweet/{tweet_id}', 'TweetsController@hideTweet');
Route::post('show-tweet/{tweet_id}', 'TweetsController@showTweet');

//Signin and register path
Route::get('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);
Route::post('register', ['as' => 'users.register', 'uses' => 'UsersController@signUp']);

Route::post('auth', ['as' => 'auth', 'uses' => 'AuthController@auth']);

//Auth Links
Route::get('sign-in', ['as' => 'sign.in', 'uses' => 'AuthController@signIn']);

Route::group(array('before' => 'auth'), function () {


    Route::get('create-entry', ['as' => 'entries_create', 'uses' => 'EntriesController@create']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

    Route::group(array('before' => 'exists:resource|ownership:resource'), function () {
        Route::resource('entries', 'EntriesController', ['except' => ['show', 'index', 'create']]);
        Route::post('users/{id}/update-password', ['as' => 'users_update_password', 'uses' => 'UsersController@updatePassword']);
        Route::resource('users', 'UsersController', ['except' => ['show', 'index', 'create', 'store']]);
    });
});


