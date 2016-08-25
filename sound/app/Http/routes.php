<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', function () {
    
        return view('welcome');
    });
});
Route::group(
    [
        'prefix' => 'soundcloud'
    ],
    function(){
    Route::resource('users', 'SoundCloud\UsersController');
});

Route::get('auth/sound-cloud', 'Auth\AuthController@redirectToProvider');
Route::get('auth/sound-cloud/callbacks', 'Auth\AuthController@handleProviderCallback');