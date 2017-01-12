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

Route::get('/', function () {

    return view('index');
});


Route::resource('onstage','OnStageController');
Route::resource('openmic','OpenMicController');
Route::resource('hash','HashTagController');
Route::group([
        'middleware' => ['auth']
    ], function(){
        
        Route::get('post/posting/{id}','PostController@posting');
        Route::resource('post','PostController');
        Route::resource('clipboard','ClipBoardController');
        
        Route::group(
            [
                'prefix' => 'user'
            ],
            function(){
                Route::get('login', 'SoundCloud\UsersController@login');
                Route::match(['get','post'],'email', 'SoundCloud\UsersController@email');
                Route::get('complate', 'SoundCloud\UsersController@complate');
                Route::match(['get'], '/','SoundCloud\UsersController@index');
                Route::match(['get'], '/tracks','SoundCloud\UsersController@tracks');
                Route::match(['get'], '/playlists','SoundCloud\UsersController@playlists');
                Route::match(['get'], '/followings','SoundCloud\UsersController@followingsList');
                Route::match(['GET', 'PUT', 'DELETE'], '/followings/{id}','SoundCloud\UsersController@followings');
                Route::match(['get'], '/followers','SoundCloud\UsersController@followersList');
                Route::match(['get'], '/followers/{id}','SoundCloud\UsersController@followers');
                Route::match(['get'], '/comments','SoundCloud\UsersController@comments');
                Route::match(['get'], '/favorites','SoundCloud\UsersController@favoritesList');
                Route::match(['GET', 'PUT', 'DELETE'], '/favorites/{id}','SoundCloud\UsersController@favorites');
                Route::match(['GET', 'PUT', 'DELETE'], '/web-profiles/{id}','SoundCloud\UsersController@webProfiles');
            }
        );
    }
);

Route::get('auth/sound-cloud', 'Auth\AuthController@redirectToProvider');
Route::get('auth/sound-cloud/callbacks', 'Auth\AuthController@handleProviderCallback');
