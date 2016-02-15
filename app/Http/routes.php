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

//home page
Route::get('/', function () {return view('welcome');});
Route::get('home', function () {return view('welcome');});

// Post routes...
Route::get('post/custom', 'PostController@custom');
Route::get('post/search','PostController@postSearch');
Route::resource('post', 'PostController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/fb_login', 'Auth\AuthController@getFBLogin');
Route::get('auth/vk_login', 'Auth\AuthController@getVKLogin');

Route::get('auth/fb_user', 'Auth\AuthController@getFBUser');
Route::get('auth/vk_user', 'Auth\AuthController@getVKUser');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//working with users
Route::post('user/update/{id}', 'UserController@update');
Route::resource('user', 'UserController',
    ['only' => ['show']]);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Comment routes
Route::post('comment', 'CommentController@store');


//Like routes
Route::post('like/ajax_check_like', 'LikeController@ajaxCheckLike');
