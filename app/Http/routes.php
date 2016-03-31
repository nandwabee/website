<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('hireme',[
        'uses' => 'ContactController@hire_me'
    ]);

    //Auth
    Route::get('login',[
        'uses' => 'Auth\AuthController@getLogin',
        'middleware' => ['guest']
    ]);

    Route::post('login',[
        'uses' => 'Auth\AuthController@postLogin',
        'middleware' => ['guest']
    ]);

    Route::get('logout', 'Auth\AuthController@logout');

    //Blogs.
    Route::get('blogs',[
        'uses' => 'Blog\BlogController@index',
        'middleware' => []
    ]);

    Route::get('blog/{id}',[
        'uses' => 'Blog\BlogController@show',
        'middleware' => []
    ]);

    Route::post('blog/{id}',[
        'uses' => 'Blog\BlogController@update',
        'middleware' => ['auth']
    ]);

    Route::get('blog/{id}/edit',[
        'uses' => 'Blog\BlogController@edit',
        'middleware' => ['auth']
    ]);

    Route::get('blog/{id}/publish',[
        'uses' => 'Blog\BlogController@publish',
        'middleware' => ['auth']
    ]);

    Route::get('blogs/new',[
        'uses' => 'Blog\BlogController@create',
        'middleware' => ['auth']
    ]);

    Route::post('blogs',[
        'uses' => 'Blog\BlogController@store',
        'middleware' => ['auth']
    ]);
});
